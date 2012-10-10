$(document).ready(function(){ LeadForm.configure() })

var LeadForm = {
	configure: function () {
  	$.get('/application_form', function ( data ) {
			$('#applicationFormContainer').append( data )
			$('.input_text, select').blur( function () { $(this).css({ backgroundColor: '#ffffe3' }) } )
			$('.input_text, select').focus( function () { $(this).css({ backgroundColor: '#def' }) } )
			$.datepicker.setDefaults({speed:'fast', mandatory:true, dateFormat:'dd/mm/yy', showOn:'button', buttonImage:'/img/chrome/calendar.gif', buttonImageOnly:true })
			$('#date_of_birth').datepicker({ minDate: '-80y', maxDate: '-18y', yearRange: '-80:-18' })
			$('#next_pay_date').datepicker({ minDate: 0, maxDate: 45, onSelect: DateMath.updateFollowingPayDateMinimum })
			$('#next_pay_date2').datepicker({ minDate: 0, maxDate: 70 })
			$('#date_of_birth, #next_pay_date, #next_pay_date2').addClass('embed')
			$('#pay_freq').bind('change', function() { DateMath.calcNextPayDates() })
			$('#submit_f').click(function( e ){
				e.preventDefault()
				if ( LeadForm.validate() ) LeadForm.confirm()
			})
	  	$('label.toolTip a, a.toolTip').cluetip({ local:true, hideLocal:true, arrows:true, cursor:'pointer', dropShadowSteps:3, width:240 })
			$('#confirmWindow .confirm-confirm').click(function( e ){
				e.preventDefault()
				$.modal.close()
				LeadForm.submit()
			})
		})
	},
	validate: function () {
		var invalid_fields = 0
		$('select, .input_text').each(function(i) {
			var id = this.id, col = '#ffffe3'
			if ( preprocessor = Validation.preprocess[id] ) this.value = preprocessor( this.value )
			if ( !this.disabled && !Validation.validate( this.value, id ) ) {
				col = 'pink'
				invalid_fields++
			}
			$(this).css({ backgroundColor: col })
		})
		if ( parseDate( $('#date_of_birth').val() ).getFullYear() == new Date().getFullYear() ) {
			alert('The year of your date of birth can\'t be this year! (' + new Date().getFullYear() + ')' )  
		}
		$('#agree_to_dpa_text').css({ backgroundColor: 'white' })
		if( !$('#agree_to_dpa').get(0).checked ) {
			$('#agree_to_dpa_text').css({ backgroundColor: 'pink' })
			invalid_fields++
		}
		var valid = invalid_fields == 0
		valid ? $('#form_invalid').hide() : $('#form_invalid').show()
		return valid
	},
	confirm: function () {
		var title = $('#title').get(0)
		$('#confirmWindow .full_name').html( title.options[title.selectedIndex].text + ' ' + $('#first_name').val() + ' ' + $('#last_name').val() )
		$('#confirmWindow .date_of_birth').html( $('#date_of_birth').val() )
		$('#confirmWindow .email').html( $('#email').val() )
		$('#confirmWindow .home_phone').html( $('#home_phone').val() )
		$('#confirmWindow .mobile_phone').html( $('#mobile_phone').val() )
		$('#confirmWindow .work_phone').html( $('#work_phone').val() )
		$('#confirmWindow .house_name').html( $('#house_name').val() )
		$('#confirmWindow .address').html( $('#address').val() )
		$('#confirmWindow .town').html( $('#town').val() )
		$('#confirmWindow .county').html( $('#county').val() )
		$('#confirmWindow .postcode').html( $('#postcode').val() )
		$('#confirmWindow .loan_amount').html( $('#loan_amount').val() )
		var primaryIncome = $('#primary_income').get(0)
		$('#confirmWindow .primary_income').html( primaryIncome.options[primaryIncome.selectedIndex].text )
		$('#confirmWindow .employer').html( $('#employer').val() )
		var timeAtEmployer = $('#time_at_employer').get(0)
		$('#confirmWindow .time_at_employer').html( timeAtEmployer.options[timeAtEmployer.selectedIndex].text )
		$('#confirmWindow .monthly_pay').html( $('#monthly_pay').val() )
		var paymentType = $('#payment_type').get(0)
		$('#confirmWindow .payment_type').html( paymentType.options[paymentType.selectedIndex].text )
		var debitCard = $('#debit_card').get(0)
		$('#confirmWindow .debit_card').html( debitCard.options[debitCard.selectedIndex].text )
		var payFreq = $('#pay_freq').get(0), payFreqIndex = payFreq.selectedIndex, payFreqPrefix = ''
		switch ( payFreqIndex ) { case 5: case 7: case 8: case 9: case 10: case 11: payFreqPrefix = 'on the '; break; case 6: payFreqPrefix = 'on a '; break }
		$('#confirmWindow .pay_freq_prefix').html( payFreqPrefix )
		$('#confirmWindow .pay_freq').html( payFreq.options[payFreqIndex].text )
		$('#confirmWindow .next_pay_date').html( $('#next_pay_date').val() )
		$('#confirmWindow .next_pay_date2').html( $('#next_pay_date2').val() )
		$('#confirmWindow').modal({ close: false, overlayId: 'confirm-overlay', containerId: 'confirm-container' })
	},
	submit: function () {
		$('#email2').after('<input class="input_text2" id="confirm" type="hidden" name="data[L][confirm]" value="confirm" />')
		$('#next_pay_date, #next_pay_date2').attr('disabled', 0)
		$('#submit_f').css({display:'none'})
		$('#submitting').css({display:'block'})
		$('#form1').get(0).submit()
	}
}

var DateMath = {
	daysOfWeek: [null,null,null,'Monday','Tuesday','Wednesday','Thursday','Friday'],
	updateFollowingPayDateMinimum: function ( selectedDateString, datePicker ) {
		$('#next_pay_date2').datepicker('change', {
   		minDate: new Date( datePicker._selectedYear, datePicker._selectedMonth, parseInt( datePicker._selectedDay ) + 1 )
   	})
	},
	calcNextPayDates: function () {
		var selectedPayFrequencyIndex = $('#pay_freq').get(0).selectedIndex
		DateMath.calcDate( selectedPayFrequencyIndex, '#next_pay_date', new Date() )
		date = new Date()
		date.setMonth( date.getMonth() + 1 )
		DateMath.calcDate( selectedPayFrequencyIndex, '#next_pay_date2', date )
	},
	getLastXofMonth: function ( dayIndex, date ) {
		var day = DateMath.daysOfWeek[dayIndex]
		date.setMonth( date.getMonth() + 1 )
		date.setDate( 0 )
		var num = 7
		while ( date.toString().substring(0,2) != day.substring(0,2) ) {
			date.setDate( date.getDate() - 1 )
			if ( --num == 0 ) break
		}
		return date
	},
	calcDate: function ( index, nextPayDateFieldName, date ) {
		nextPayDateField = $(nextPayDateFieldName)
		switch ( index ) {
			case 0: case 2: case 8: case 9: case 10: case 11:
				nextPayDateField.datepicker('enable')
				nextPayDateField.val('')
				break
			case 1:
				nextPayDateField.datepicker('disable')
				date.setMonth( date.getMonth() + 1 )
				date.setDate( 0 )
				if ( date.getDay() == 6 ) { //SATURDAY
					date.setDate( date.getDate() - 1 )
				} else if ( date.getDay() == 0 ) { // SUNDAY
					date.setDate( date.getDate() - 2 )
				}
				nextPayDateField.val( formatDate( date, 'dd/MM/yyyy' ) )
				break
			case 3: case 4: case 5: case 6: case 7:
				nextPayDateField.datepicker('disable')
				nextPayDateField.val( formatDate( DateMath.getLastXofMonth(index,date), 'dd/MM/yyyy' ) )
				break
		}
		nextPayDateField.css({backgroundColor: '#ffffe3'})
	}
}

var Validation = {
	validate: function ( value, id ) {
		return !( value == '' || ( Validation.regex[id] && !value.match( Validation.regex[id] ) ) || ( Validation.validators[id] && !Validation.validators[id](value) ) )
	},
	preprocess: {
		mobile_phone: function(i) { return i.replace(/ /g, '') },
		home_phone: 	function(i) { return i.replace(/ /g, '') },
		work_phone: 	function(i) { return i.replace(/ /g, '') },
		postcode: 		function(i) { return i.toUpperCase() },
		monthly_pay: 	function(i) { return i.replace(/\.[0-9]{2}$/,'') },
		loan_amount: 	function(i) { return i.replace(/\.[0-9]{2}$/,'') }
	},	
	regex: {
		first_name: 	/[A-Za-z]+/,
		last_name: 		/[A-Za-z]+/,
		email: 				/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{ 1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$/,
		home_phone: 	/^0[12][0-9]{9}$/,
		mobile_phone: /^07[0-9]{9}$/,
		work_phone:		/^0[12][0-9]{9}$/,
		house_name: 	/[A-Za-z0-9 ]{1,50}/,
		address: 			/[A-Za-z0-9 ]+/,
		town: 				/[A-Za-z ]+/,
		postcode: 		/(^(?:((GIR)\s{0,1}((0AA))))|(?:((X9)\s{0,1}((9AL))))|(?:((X9)\s{0,1}((9LF))))|(?:((X9)\s{0,1}((9BN))))|(?:([A-PR-UWYZ][0-9][0-9]?)|(?:[A-PR-UWYZ][A-HK-Y][0-9][0-9]?)|(?:[A-PR-UWYZ][0-9][A-HJKSTUW])|(?:[A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRVWXY]))\s{0,1}([0-9][ABD-HJLNP-UW-Z]{2})$)/,
		monthly_pay: 	/^[0-9]{2,10}$/,
		loan_amount: 	/^[0-9]{2,10}$/
	},	
	validators: {
		confirm_email: function () { return $('#confirm_email').get(0).value == $('#email').get(0).value },
		loan_amount:   function ( value ) { return value > 79 && value < 751 }
	}
}