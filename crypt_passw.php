<?
$passw='1234';
$cust = '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$val='$2a$' . $cust . '$' . $salt . '$';
echo crypt($passw,$val);
/*
> $user->password=crypt($passw);

   NOTICE  crypt(): No salt parameter was specified. You must use a randomly generated salt and a strong hash function to produce a secure hash.

= "$1$fBSQ1TXd$wvpgFDs0XPgx7FZql6f3K."

> $cust = '08';
= "08"

> $salt = 'Cf1f11ePArKlBJomM0F6aJ';
= "Cf1f11ePArKlBJomM0F6aJ"

> $val='$2a$' . $cust . '$' . $salt . '$';
= "$2a$08$Cf1f11ePArKlBJomM0F6aJ$"

> $user->password=crypt($passw,$val);
= "$2a$08$Cf1f11ePArKlBJomM0F6a.j6/zWYbxa1beIDqDjaBsd6mH3A8dXHq"

*/
?>
