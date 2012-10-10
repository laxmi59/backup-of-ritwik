/* displays select states if chosen country is US */
function switch_state_input(country) {
    if (country == 'US') {
                document.getElementById('state').style.display = 'none';
                document.getElementById('state_select').style.display = 'block';
    } else {
                document.getElementById('state').value = '';
                document.getElementById('state').style.display = 'block';
                document.getElementById('state_select').style.display = 'none';
        }
}

/* display specific account type information */
function display_account(account_type) {
        if (account_type == 'extension') {
                document.getElementById('ext_setup').style.display = 'block';
                document.getElementById('phone_lang').style.display = 'block';
                document.getElementById('ext_type_info').style.display = 'block';
                document.getElementById('extension_form').style.display = 'block';
                document.getElementById('reseller_form').style.display = 'none';
                document.getElementById('client_form').style.display = 'none';
        } else {
                document.getElementById('ext_setup').style.display = 'none';
                document.getElementById('phone_lang').style.display = 'none';
                document.getElementById('ext_type_info').style.display = 'none';
                if (account_type == 'reseller') {
                        document.getElementById('reseller_form').style.display = 'block';
                        document.getElementById('client_form').style.display = 'none';
                        document.getElementById('extension_form').style.display = 'none';
                } else {
                        document.getElementById('client_form').style.display = 'block';
                        document.getElementById('reseller_form').style.display = 'none';
                        document.getElementById('extension_form').style.display = 'none';
                }
        }
}
