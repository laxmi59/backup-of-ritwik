<?php
require_once("Database.class.php");
/*******************************************************************************
*                                  Pagination class                            *
*                             Created: 12th January 2009                       *
*                             Updated: 9th September 2009                      *
*                             ©Copyright Jay Gilford 2009                      *
*                              http://www.jaygilford.com                       *
*                            email: jay [at] jaygilford.com                    *
*******************************************************************************/
 
class pagination extends Database {
    ################################
    # PRIVATE VARS - DO NOT ALTER  #
    ################################
    private $_query = '';
    private $_current_page = 1;
    private $_padding = 2;
    private $_results_resource;
    private $_output;
	private $_newsletter;
	private $_message;
	private $_report;
 
    ################################
    #       RESULTS VARS           #
    ################################
    public $results_per_page = 10;          #Number of results to display at a time
    public $total_results = 0;              #Total number of records
    public $total_pages = 0;                #Total number of pages
 
    public $link_prefix = '/?page=';        #String for link to go before the page number
    public $link_suffix = '';               #String for link to go after the page number
    public $page_nums_separator = ' | ';    #String to go between the page number links
	public $_range = 2;
	public $_tr = "";
	public $_sorting_field = 'contractorid';
	public $_sorting_type = 'DESC';
	public $_contractor = "";
 
    ################################
    #      ERROR HOLDING VAR       #
    ################################
    public $error = null;
 
    ################################
    # PAGINATION TEMPLATE DEFAULTS #
    ################################
    public $tpl_first = '<a href="{link}">&laquo;</a> | ';
    public $tpl_last = ' | <a href="{link}">&raquo;</a> ';
 
    public $tpl_prev = '<a href="{link}">&lsaquo;</a> | ';
    public $tpl_next = ' | <a href="{link}">&rsaquo;</a> ';
 
    public $tpl_page_nums = '<span><a href="{link}">{page}</a></span>';
    public $tpl_cur_page_num = '<span>{page}</span>';
 
    /**
     * In the above templates {link} is where the link will be inserted and {page} is
     * where the page numbers will be inserted. Other than that, you can modify them
     * as you please
     *
     * NOTE: You should have a separator of some sort at the right of $tpl_first and
     * $tpl_prev as above in the defaults, and also have a separator of some sort
     * before the $tpl_next and $tpl_last templates
     **/
 
 
    ##################################################################################
 
 
    public function __construct($page, $query, $records, $sortingField, $sortingType, $contractor="", $newsletter="", $message="", $report="")
    {
		#Check page number is a positive integer greater than 0 and assign it to $this->_current_page
        if ((int)$page > 0)
            $this->_current_page = (int)$page;
			
		if ((int)$records > 0)
            $this->results_per_page = (int)$records;
			
		$this->_sorting_field = $sortingField;
		$this->_sorting_type = $sortingType;
		$this->_contractor = $contractor;
		$this->_newsletter = $newsletter;
		$this->_message = $message;
		$this->_report = $report;
 		#Remove any LIMIT clauses in the query string and set if
        $query = trim(preg_replace('/[\s]+LIMIT[\s]+\d+([\s,]*,[^\d]*\d+)?/i', '', $query));
        if (empty($query)) {
            return false;
        } else {
            $this->_query = $query;
        }
		
		parent::__construct(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
    }
 
    /**
     * pagination::paginate()
     *
     * Processes all values and query strings and if successful
     * returns a string of html text for use with pagination bar
     *
     * @return string;
     */
    public function paginate()
    {
         		
        #########################################
        # GET TOTAL NUMBER OF RESULTS AND PAGES #
        #########################################
		$result = $this->query($this->_query);
        if (!$result) {
            $this->error = __line__ . ' - ' . mysql_error();
            return false;
        }
        $this->total_results = mysql_num_rows($result);
        $this->total_pages = ceil($this->total_results / $this->results_per_page);
		$this->_results_resource = $result;
 
        ########################
        # FREE RESULT RESOURCE #
        ########################
 
        ################################
        # IF TOTAL PAGES <= 1 RETURN 1 #
        ################################
        if ($this->total_pages <= 1)
        {
        	$this->_results_resource = $result;
			
			$page = " <span class='pagenation-none'>&lt;&lt; first</span>&nbsp;<span class='pagenation-none'>&lt; prev</span> ";
			$page .= " <span class='pagenation-none'>1</span> ";
			$page .= " <span class='pagenation-none'>next &gt;</span>&nbsp;<span class='pagenation-none'>last &gt;&gt;</span> ";
					
			return $page;
        }
 		$this->free_result($result);

        ###################################################
        # CHECK CURRENT PAGE ISN'T GREATER THAN MAX PAGES #
        ###################################################
        if ($this->_current_page > $this->total_pages)
            $this->_current_page = $this->total_pages;
			
		$start = ($this->_current_page - $this->_padding > 0) ? $this->_current_page - $this->
            _padding : '1';
        $finish = ($this->_current_page + $this->_padding <= $this->total_pages) ? $this->
            _current_page + $this->_padding : $this->total_pages;
 
        ###########################################
        # CREATE LIMIT CLAUSE AND ASSIGN TO QUERY #
        ###########################################
        $limit = ' LIMIT ' . ($this->results_per_page * ($this->_current_page - 1)) .
            ',' . $this->results_per_page;
        $query = $this->_query . $limit;
 
        #############################################
        # RUN QUERY AND ASSIGN TO $_result_resource #
        #############################################
		$result = $this->query($query);
        if ($result === false) {
            $this->error = __line__ . ' - ' . mysql_error();
            return false;
        }
        $this->_results_resource = $result;
			
		if ($this->_current_page <= 5) {
			$from = 1;
			$upto = 6;
		} elseif (($this->total_pages - $this->_current_page) < 5) {
			$from = $this->total_pages - 4;
			$upto = $this->total_pages + 1;
		} else {
			$from = $this->_current_page - $this->_range;
			$upto = ($this->_current_page + $this->_range) + 1;
		}
		
		if ($this->_contractor != "") {
			$pass = "&contractor=$this->_contractor";
		} elseif ($this->_newsletter != "" && $this->_message != "" && $this->_report != "") {
			$pass = "&newsletter=$this->_newsletter&messageId=$this->_message&report=$this->_report";
		} else {
			$pass = "";
		}
		
		// if not on page 1, don't show back links
		if ($this->_current_page > 1) {
			// get previous page num
		   $prevpage = $this->_current_page - 1;
		   // show << link to go back to page 1
		   $page = " <a href='{$_SERVER['PHP_SELF']}?page=1&sortingField=$this->_sorting_field&sortingType=$this->_sorting_type&totalRecords=$this->results_per_page" . $pass . "'>&lt;&lt; first</a> ";
		   // show < link to go back to 1 page
		   $page .= " <a href='{$_SERVER['PHP_SELF']}?page=$prevpage&sortingField=$this->_sorting_field&sortingType=$this->_sorting_type&totalRecords=$this->results_per_page" . $pass . "'>&lt; prev</a> ";
		} else {
			$page = " <span class='pagenation-none'>&lt;&lt; first</span>&nbsp;<span class='pagenation-none'>&lt; prev</span> ";
		}
		
		// loop to show links to range of pages around current page
		for ($x = $from; $x < $upto; $x++) {
			// if it's a valid page number...
		   if (($x > 0) && ($x <= $this->total_pages)) {
			  // if we're on current page...
			  if ($x == $this->_current_page) {
				 // 'highlight' it but don't make a link
				 $page .= " <span class='pagenation-none'>$x</span> ";
			  // if not current page...
			  } else {
				 // make it a link
				 $page .= " <a href='{$_SERVER['PHP_SELF']}?page=$x&sortingField=$this->_sorting_field&sortingType=$this->_sorting_type&totalRecords=$this->results_per_page" . $pass . "'>$x</a> ";
			  } // end else
		   } // end if
		} // end for

		// if not on last page, show forward and last page links        
		if ($this->_current_page != $this->total_pages) {
		   // get next page
		   $nextpage = $this->_current_page + 1;
			// echo forward link for next page 
		   $page .= " <a href='{$_SERVER['PHP_SELF']}?page=$nextpage&sortingField=$this->_sorting_field&sortingType=$this->_sorting_type&totalRecords=$this->results_per_page" . $pass . "'>next &gt;</a> ";
		   // echo forward link for lastpage
		   $page .= " <a href='{$_SERVER['PHP_SELF']}?page=$this->total_pages&sortingField=$this->_sorting_field&sortingType=$this->_sorting_type&totalRecords=$this->results_per_page" . $pass . "'>last &gt;&gt;</a> ";
		} else {
			$page .= " <span class='pagenation-none'>next &gt;</span>&nbsp;<span class='pagenation-none'>last &gt;&gt;</span> ";
		}
		/****** end build pagination links ******/
		return $page;
    }
 
 
    /**
     * pagination::padding()
     *
     * Sets the padding for the pagination string
     *
     * @param int $val
     * @return bool
     */
    public function padding($val)
    {
        if ((int)$val < 1)
            return false;
 
        $this->_padding = (int)$val;
        return true;
    }
 
 
    /**
     * pagination::resource()
     *
     * Returns the resource of the results query
     *
     * @return resource
     */
    function resource()
    {
       	return $this->_results_resource;
    }
 
 
    /**
     * pagination::__tostring()
     * returns the last pagination output
     *
     * @return string
     */
    function __tostring()
    {
        if (trim($this->_output)) {
            return trim($this->_output);
        }else{
        	return '';
        }
    }
}
?>