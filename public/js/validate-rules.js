var validateRules ={
	nom : {
		required : true,
		minlength: 1,
		maxlength: 20
	},
	prenom : {
		required : true
	},
	adresse : {
		required : true
	},
	cp : {
		required : true,
		number: true
	},
	ville : {
		required: true	
	},
	pays : {
		required: true	
	},
	date : {
		required : true
	},
	email : {
		required : true,
		email: true
	},
	login : {
		required : true
	},
	password : {
		pwcheck : true,
		required : true,
		minlength: 8
	},
	password_confirmation : {
		required : true,
		equalTo: "#password"
	} 
}