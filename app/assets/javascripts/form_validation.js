// form validations
var validate = {
	
	init: function(){
		this.check()
		this.recheck()
	},

	recheck: function(){
		check = this.check

		// input fields 
		$("input[validate='true']").keyup(function(){
			check()
		})

		// select dropdowns
		$("select[validate='true']").change(function(){
			check()
		})

		// checkbox and radio fields
		$("input[type='checkbox']").change(function(){
			check()
		})
	},

	check: function() {
		var form = $('form[validate="true"]')
		var email_validation = validate.email
		var confirm_password_validation = validate.confirm_password

		form.each(function(){

			var submit = $(this).find('input[type="submit"]')
			var all_filled = true

			// find validatable elements
			$("*[validate='true']").each(function(){
				var value = $(this).attr('value')
				
				if (value == '') {
					all_filled = false
				}
				
				// validating email
				if (email_validation(value, $(this)) == false)
					all_filled = false

				// validating password and confirmation
				if (confirm_password_validation($(this)) == false)
					all_filled = false
			})

			if (all_filled == true) {
				submit.removeAttr('disabled')
			} else {
				submit.attr('disabled', 'disabled')
			}

		})
	},

	email: function(str, instance) {
		var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
		if (instance.attr('validate_flag') == 'email') {
			if (str.match(pattern) == null)
				return false
			else
				return true
		}
	},

	confirm_password: function(instance) {
		if (instance.attr('validate_flag') == 'password') {
			password = instance.val()
			confirm_password = $("input[validate_flag='confirm_password']").val()
			if (password != confirm_password)
				return false
		}
	}

}

$(document).ready(function(){
	Fly = window.Fly || {}
	Fly.validate = validate
	Fly.validate.init()
	window.Fly = Fly

})