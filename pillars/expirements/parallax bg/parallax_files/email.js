var email={input:'',invalid:'email not valid',openner:'your email'}
function emailCheck(emailStr){var checkTLD=1;var knownDomsPat=/^(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum|tv)$/;var emailPat=/^(.+)@(.+)$/;var specialChars="\\(\\)><@,;:\\\\\\\"\\.\\[\\]";var validChars="\[^\\s"+ specialChars+"\]";var quotedUser="(\"[^\"]*\")";var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;var atom=validChars+'+';var word="("+ atom+"|"+ quotedUser+")";var userPat=new RegExp("^"+ word+"(\\."+ word+")*$");var domainPat=new RegExp("^"+ atom+"(\\."+ atom+")*$");var matchArray=emailStr.match(emailPat);if(matchArray==null){return false;}
var user=matchArray[1];var domain=matchArray[2];for(i=0;i<user.length;i++){if(user.charCodeAt(i)>127){return false;}}
for(i=0;i<domain.length;i++){if(domain.charCodeAt(i)>127){return false;}}
if(user.match(userPat)==null){return false;}
var IPArray=domain.match(ipDomainPat);if(IPArray!=null){for(var i=1;i<=4;i++){if(IPArray[i]>255){return false;}}
return true;}
var atomPat=new RegExp("^"+ atom+"$");var domArr=domain.split(".");var len=domArr.length;for(i=0;i<len;i++){if(domArr[i].search(atomPat)==-1){return false;}}
if(checkTLD&&domArr[domArr.length-1].length!=2&&domArr[domArr.length-1].search(knownDomsPat)==-1){return false;}
if(len<2){return false;}
return true;}
jQuery(document).ready(function(){jQuery('#message :input[name="email"]').val(email.openner).focus(function(){jQuery('#message :input[name="email"]').val(email.input).removeClass("error");}).blur(function(){if(!jQuery('#message :input[name="email"]').val())jQuery('#message :input[name="email"]').val(email.openner);})
jQuery('#message input:submit').click(function(){var emailaddress=jQuery('#message :input[name="email"]').val();if(emailCheck(emailaddress)){return true;}
else if(jQuery('#message :input[name="email"]').val()!=email.invalid){email.input=jQuery('#message :input[name="email"]').val();jQuery('#message :input[name="email"]').val(email.invalid).addClass("error");};return false;});});