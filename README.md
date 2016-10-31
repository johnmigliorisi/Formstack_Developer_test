# Formstack_Developer_test

##John Migliorisi (johnmigliorisi@gmail.com)

I tried to approach this as simply as possible. 
* index.php
	* see a list of users
	* edit an exisitng user (link takes you to edit.php)
	* create a user (link to add.php)
	* delete a user

I struggled a bit with the understanding the *proper* approach to MVC. Some articles talk about the original implementation in Smalltalk-80. They describe a circular interaction View -> controller -> model ->View. Other resources instead put the controller as the gatekeeper between the view and the model. If there is work to be done, beyond grabbing data from the DB, the controller pretty much handles it.

I was confused which method to choose so, I got a coaching session on Saturday morning. We went over the second approach described above, so that is what I implemented. If Formstack does it differenly I am happy to learn your best practices. 


