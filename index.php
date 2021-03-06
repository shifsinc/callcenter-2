<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><!--{{{1-->
<?php require_once("authorize.php") ?>


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
  <meta content="utf-8" http-equiv="encoding">
  <title>Call Center &mdash; Volo Broadband&trade;</title>
<style type="text/css">
/* Palette
 * medium yellow:       #FF7
 * light yellow:        #FFC
 * volo blue:           #027AC6
 */

body
{
    background: #FFC;
    padding: 0em;
    margin: 0em;
}

div.panel
{
    border: 1px solid #AAA;
    background: white;
    height: 100%;
}

html, body { height: 90%; }
#container, #panels { height: 100%; }
div.panel h3
{
    margin: 0em;
    padding: 0.5em;
    border-bottom: 1px solid #AAA;
    background: #FF7;
}

#i
{
    float: left;
    width: 66%;
}

#i div.panel-content { max-height: 95%; overflow: scroll; }
#i div.panel-content { overflow-x: hidden; }

#i input.selected { border-color: #027AC6; background-color: #DEF; }

#o
{
    float: right;
    width: 32%;
}

#panels { margin: 1em; }

div.required { color: #027AC6; }

.invalid { background: #FEE; color: #900; border-color: #900; }

#o { background: #FFC; border: none; }

fieldset
{
    margin-top: 0; margin-bottom: 1em;
    background: white;
    border: 1px solid #AAA;
}

legend
{
    margin: 0em;
    padding: 0.3em;
    border: 1px solid #AAA;
    background: #FF7;
}

div.element { clear: left; }

div.element label
{
    display: block;
    padding-top: 0.3em;
    width: 7.5em;
    float: left;
}

#i div.element label { width: 9em; }
#i div.element input { font-size: 100%; }

#o div.element label
{
    font-size: 90%;
    color: #777;
}

#o div.element input
{
    background: white;
    color: black;
    border: none;
    padding-top: 0.3em;
    width: 14em;
}

#top-buttons { float: right; padding-top: 0.7em; }
#top-buttons span.wrapper { padding-left: 0.5em; }
#top-buttons a { padding: 0.3em; }
#top-buttons a:hover { background: #F33; color: white; }

a
{
    color: #027AC6;
    text-decoration: none;
}

div.screen
{
    border-bottom: 1px solid #AAA;
    padding-bottom: 0.5em;
}

div.screen-title
{
    padding: 0.5em;
    font-weight: bolder;
    font-size: larger;
    background: #FFC;
}

div.screen-old { background: #EEE; }
div.screen-old div.screen-title { background: #DDD; }

div.screen-body
{
    padding: 0.5em;
    padding-bottom: 0.3;
    padding-top: 0.3;
}

div.screen-body span.url { font-family: monospace; }
div.screen-body { font-family: sans-serif; }
div.screen-body .dont-say { font-family: serif; color: #555; }
div.screen-body::before { content: "Say: "; }
div.screen-body .dont-say::before { content: "FYI: "; }

.todo { color: red; }

#inputs { display: none; }

div.input-set { margin-left: 2em; }

div.buttons { clear: all; text-align: center; padding-top: 0.5em; }

div.screen p { padding: 0; margin-top: 0; margin-bottom: 0.7em; }

div.screen { position: relative; }
a.back
{
    position: absolute;
    right: 0;
    bottom: 0;
    text-align: right;
    margin-bottom: 0.5em;
    margin-right: 0.5em;
    background: inherit;
    font-weight: bolder;
    font-size: 90%;
    color: #AAA;
}

a.back:hover
{
    color: #027AC6;
}

div.screen:first-child a.back { display: none; }
div.screen-old:first-child a.back { display: inline; }

#f-account-info { display: none; } /* Not ready yet */
#f-other-info { display: none; } /* Misc fields that don't need to be seen */

p.ticket-name { font-weight: bold; }
p.ticket-comment
{
    font-size: 90%;
    margin: 0;
    padding: 0;
    margin-bottom: 0.3em;
}
span.comment-date { font-weight: bold; }
span.comment-user { color: #777; font-style: italic; }
span.comment-user:before { content: ' by '; }
span.comment-body { white-space: pre-line; }

input.not-an-apartment
{
    font-size: 80%!important;
}

input.copy-caller-id
{
    font-size: 80%!important;
}

.todo { display: none; }

</style>
  <link href="callcenter.css" rel="stylesheet" type="text/css" media="screen,print"/>
<style type="text/css">
.ac_results {
	padding: 0px;
	border: 1px solid black;
	background-color: white;
	overflow: hidden;
	z-index: 99999;
}

.ac_results ul {
	width: 100%;
	list-style-position: outside;
	list-style: none;
	padding: 0;
	margin: 0;
}

.ac_results li {
	margin: 0px;
	padding: 2px 5px;
	cursor: default;
	display: block;
	/* 
	if width will be 100% horizontal scrollbar will apear 
	when scroll mode will be used
	*/
	/*width: 100%;*/
	font: menu;
	font-size: 12px;
	/* 
	it is very important, if line-height not setted or setted 
	in relative units scroll will be broken in firefox
	*/
	line-height: 16px;
	overflow: hidden;
}

.ac_loading {
	background: white url('indicator.gif') right center no-repeat;
}

.ac_odd {
	background-color: #eee;
}

.ac_over {
	background-color: #0A246A;
	color: white;
}
</style>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<?php $operator = $_SERVER[REMOTE_USER]; ?>

<body>
<!--}}}1-->
<div id="container">

    <div id="panels">
        <div id="i" class="panel"><!--{{{1-->
            <div id="top-buttons">
                <label>Start Over:</label>
                <span class="wrapper"><a id="new-call" href="#">New Call</a></span>
                <span class="wrapper"><a id="restart-call" href="#">This Call</a></span>
            </div>
            <h3>Volo Call Center Script</h3>
            <div class="panel-content">
            </div>
        </div><!--#i }}}-->

        <div id="o" class="panel"><!--{{{1-->
            <div class="panel-content">
                <fieldset id="f-caller-info"><!--{{{2-->
                    <legend>Caller Information</legend>
                    <div class="element" id="r-ticket">
                        <label for="v-ticket">Ticket #</label>
                        <div class="value">
                            <input type="text" name="v-ticket" id="v-ticket" size="4"/>
                        </div>
                    </div>
                    <div class="element" id="r-calltime">
                        <label for="v-calltime">Time of call</label>
                        <div class="value">
                            <input type="text" name="v-calltime" id="v-calltime" size="8" class="time"/>
                        </div>
                    </div>
                    <div class="element" id="r-callerphone">
                        <label for="v-callerphone">Caller ID</label>
                        <div class="value">
                            <input type="text" name="v-callerphone" id="v-callerphone" size="10" class="phone"/>
                        </div>
                    </div>
                    <div class="element" id="r-firstname">
                        <label for="v-firstname">First name</label>
                        <div class="value">
                            <input type="text" name="v-firstname" id="v-firstname" size="15"/>
                        </div>
                    </div>
                    <div class="element" id="r-lastname">
                        <label for="v-lastname">Last name</label>
                        <div class="value">
                            <input type="text" name="v-lastname" id="v-lastname" size="15"/>
                        </div>
                    </div>
                    <div class="element" id="r-serviceaddress">
                        <label for="v-serviceaddress">Service addr</label>
                        <div class="value">
                            <input type="text" name="v-serviceaddress" id="v-serviceaddress" size="36"/>
                        </div>
                    </div>
                    <div class="element" id="r-aptunit">
                        <label for="v-aptunit">Apt #</label>
                        <div class="value">
                            <input type="text" name="v-aptunit" id="v-aptunit" size="18"/>
                        </div>
                    </div>
                    <div class="element" id="r-servicezip">
                        <label for="v-servicezip">Zip code</label>
                        <div class="value">
                            <input type="text" name="v-servicezip" id="v-servicezip" size="5" class="zip"/>
                        </div>
                    </div>
                    <div class="element" id="r-servicecity">
                        <label for="v-servicecity">City</label>
                        <div class="value">
                            <input type="text" name="v-servicecity" id="v-servicecity" size="5" class="city"/>
                        </div>
                    </div>
                    <div class="element" id="r-billingemail">
                        <label for="v-billingemail">Billing Email</label>
                        <div class="value">
                            <input type="text" name="v-billingemail" id="v-billingemail" size="5" class="email"/>
                        </div>
                    </div>
                </fieldset>

                <fieldset id="f-account-info"><!--{{{2-->
                    <legend>Account Information</legend>
                    <div class="element" id="r-customer">
                        <label for="v-customer">Account #</label>
                        <div class="value">
                            <input type="text" name="v-customer" id="v-customer" size="6" class="account"/>
                        </div>
                    </div>
                    <div class="element" id="r-accountpassword">
                        <label for="v-accountpassword">Password</label>
                        <div class="value">
                            <input type="text" name="v-accountpassword" id="v-accountpassword" size="6" class="password"/>
                        </div>
                    </div>
                    <div class="element" id="r-balance">
                        <label for="v-balance">Balance</label>
                        <div class="value">
                            <input type="text" name="v-balance" id="v-balance" size="6" class="balance"/>
                        </div>
                    </div>
                </fieldset>

                <fieldset id="f-service-info"><!--{{{2-->
                    <legend>Service Information</legend>
                    <div class="element" id="r-ip">
                        <label for="v-ip">IP address</label>
                        <div class="value">
                            <input type="text" name="v-ip" id="v-ip" size="15" class="ip"/>
                        </div>
                    </div>
                    <div class="element" id="r-service">
                        <label for="v-service">Service</label>
                        <div class="value">
                            <input type="text" name="v-service" id="v-service" size="15"/>
                        </div>
                    </div>
                    <div class="element" id="r-tncplan">
                        <label for="v-tncplan">TNC Plan</label>
                        <div class="value">
                            <input type="text" name="v-tncplan" id="v-tncplan" size="15"/>
                        </div>
                    </div>
                    <div class="element" id="r-winfieldplan">
                        <label for="v-winfieldplan">Winfield Plan</label>
                        <div class="value">
                            <input type="text" name="v-winfieldplan" id="v-winfieldplan" size="15"/>
                        </div>
                    </div>
                    <div class="element" id="r-baileyplan">
                        <label for="v-baileyplan">Bailey Plan</label>
                        <div class="value">
                            <input type="text" name="v-baileyplan" id="v-baileyplan" size="15"/>
                        </div>
                    </div>
                    <div class="element" id="r-company">
                        <label for="v-company">Company</label>
                        <div class="value">
                            <input type="text" name="v-company" id="v-company" size="18"/>
                        </div>
                    </div>
                    <div class="element" id="r-activated">
                        <label for="v-activated">Activated On</label>
                        <div class="value">
                            <input type="text" name="v-activated" id="v-activated" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-deactivated">
                        <label for="v-deactivated">Deactivated On</label>
                        <div class="value">
                            <input type="text" name="v-deactivated" id="v-deactivated" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-servicestart">
                        <label for="v-servicestart">Date</label>
                        <div class="value">
                            <input type="text" name="v-servicestart" id="v-servicestart" size="20"/>
                        </div>
                    </div>
                </fieldset><!--2}}}-->

                <fieldset id="f-other-info"><!--{{{2-->
                    <legend>Other Information</legend>
                    <div class="element" id="r-call-id">
                        <label for="v-ticket">Call ID</label>
                        <div class="value">
                            <input type="text" name="v-call-id" id="v-call-id" size="4"/>
                        </div>
                    </div>
                    <div class="element" id="r-operator">
                        <label for="v-operator">Operator</label>
                        <div class="value">
                            <input type="text" name="v-operator" id="v-operator" size="15" value="<?= $operator ?>"/>
                        </div>
                    </div>
                    <div class="element" id="r-phone">
                        <label for="v-phone">Phone</label>
                        <div class="value">
                            <input type="text" name="v-phone" id="v-phone" size="10" class="phone"/>
                        </div>
                    </div>
                    <div class="element" id="r-username">
                        <label for="v-username">Username</label>
                        <div class="value">
                            <input type="text" name="v-username" id="v-username" size="10" class="username"/>
                        </div>
                    </div>
                    <div class="element" id="r-email">
                        <label for="v-email">Email</label>
                        <div class="value">
                            <input type="text" name="v-email" id="v-email" size="5" class="email"/>
                        </div>
                    </div>
                    <div class="element" id="r-password">
                        <label for="v-password">Password</label>
                        <div class="value">
                            <input type="text" name="v-password" id="v-password" size="20" class="password"/>
                        </div>
                    </div>
                    <div class="element" id="r-messagetype">
                        <label for="v-messagetype">Type of message</label>
                        <div class="value">
                            <input type="text" name="v-messagetype" id="v-messagetype" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-forwhom">
                        <label for="v-forwhom">Message is for</label>
                        <div class="value">
                            <input type="text" name="v-forwhom" id="v-forwhom" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-problem">
                        <label for="v-problem">Problem Type</label>
                        <div class="value">
                            <textarea name="v-problem" id="v-problem" rows="3" cols="30"></textarea>
                        </div>
                    </div>
                    <div class="element" id="r-message">
                        <label for="v-message">Message</label>
                        <div class="value">
                            <textarea name="v-message" id="v-message" rows="4" cols="30"></textarea>
                        </div>
                    </div>
                    <div class="element" id="r-eta">
                        <label for="v-eta">ETA</label>
                        <div class="value">
                            <textarea name="v-eta" id="v-eta" rows="4" cols="10"></textarea>
                        </div>
                    </div>
                    <div class="element" id="r-hour">
                        <label for="v-hour">Hour</label>
                        <div class="value">
                            <input type="text" name="v-hour" id="v-hour" size="5"/>
                        </div>
                    </div>
                    <div class="element" id="r-date">
                        <label for="v-date">Date</label>
                        <div class="value">
                            <input type="text" name="v-date" id="v-date" size="20"/>
                        </div>
                    </div>
                    <div class="element" id="r-sendtech">
                        <label for="v-sendtech">Send tech</label>
                        <div class="value">
                            <input type="text" name="v-sendtech" id="v-sendtech" size="20"/>
                        </div>
                    </div>
                    <div class="element" id="r-pingtime">
                        <label for="v-pingtime">Ping time</label>
                        <div class="value">
                            <input type="text" name="v-pingtime" id="v-pingtime" size="10" value="0"/>
                        </div>
                    </div>
                    <div class="element" id="r-speedtestdown">
                        <label for="v-speedtestdown">Speedtest Download</label>
                        <div class="value">
                            <input type="text" name="v-speedtestdown" id="v-speedtestdown" size="10" value="0"/>
                        </div>
                    </div>
                    <div class="element" id="r-speedtestup">
                        <label for="v-speedtestup">Speedtest Upload</label>
                        <div class="value">
                            <input type="text" name="v-speedtestup" id="v-speedtestup" size="10" value="0"/>
                        </div>
                    </div>
                    <div class="element" id="r-hasrouter">
                        <label for="v-hasrouter">Has router</label>
                        <div class="value">
                            <input type="text" name="v-hasrouter" id="v-hasrouter" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-phonetype">
                        <label for="v-phonetype">Phone type</label>
                        <div class="value">
                            <input type="text" name="v-phonetype" id="v-phonetype" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-minimumspeed">
                        <label for="v-minimumspeed">Minimum Speed</label>
                        <div class="value">
                            <input type="text" name="v-minimumspeed" id="v-minimumspeed" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-routerwifi">
                        <label for="v-routerwifi">Routerwifi</label>
                        <div class="value">
                            <input type="text" name="v-routerwifi" id="v-routerwifi" value="direct" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-webproblemtype">
                        <label for="v-webproblemtype">Problem type</label>
                        <div class="value">
                            <input type="text" name="v-webproblemtype" id="v-webproblemtype" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-onecomputer">
                        <label for="v-onecomputer">Computers affected</label>
                        <div class="value">
                            <input type="text" name="v-onecomputer" id="v-onecomputer" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-callin">
                        <label for="v-callin">Calling in</label>
                        <div class="value">
                            <input type="text" name="v-callin" id="v-callin" />
                        </div>
                    </div>
                    <div class="element" id="r-callout">
                        <label for="v-callout">Calling out</label>
                        <div class="value">
                            <input type="text" name="v-callout" id="v-callout" />
                        </div>
                    </div>
                    <div class="element" id="r-voipreg">
                        <label for="v-voipreg">VoIP registration</label>
                        <div class="value">
                            <input type="text" name="v-voipreg" id="v-voipreg" />
                        </div>
                    </div>
                    <div class="element" id="r-referredby">
                        <label for="v-referredby">Heard about from or referred by</label>
                        <div class="value">
                            <input type="text" name="v-referredby" id="v-referredby" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-switchip">
                        <label for="v-switchip">Switch IP</label>
                        <div class="value">
                            <input type="text" name="v-switchip" id="v-switchip" size="15"/>
                        </div>
                    </div>
                    <div class="element" id="r-switchport">
                        <label for="v-switchport">Switch Port</label>
                        <div class="value">
                            <input type="text" name="v-switchport" id="v-switchport" size="3"/>
                        </div>
                    </div>
                    <div class="element" id="r-urgency">
                        <label for="v-urgency">Urgency</label>
                        <div class="value">
                            <input type="text" name="v-urgency" id="v-urgency" size="10"/>
                        </div>
                    </div>
                    <div class="element" id="r-cancelagain">
                        <label for="v-cancelagain">Cancel another service</label>
                        <div class="value">
                            <input type="text" name="v-cancelagain" id="v-cancelagain" />
                        </div>
                    </div>
                    <div class="element" id="r-retrieve">
                        <label for="v-retrieve">Make Retrieval Ticket</label>
                        <div class="value">
                            <input type="text" name="v-retrieve" id="v-retrieve" />
                        </div>
                    </div>
                    <div class="element" id="r-node">
                        <label for="v-node">Service</label>
                        <div class="value">
                            <input type="text" name="v-node" id="v-node" size="15"/>
                        </div>
                    </div>
                    <div class="element" id="r-aptservice">
                        <label for="v-aptservice">Service Level</label>
                        <div class="value">
                            <input type="text" name="v-aptservice" id="v-aptservice" size="10"/>
                        </div>
                    </div>
                </fieldset>
            </div><!--2}}}-->

            <button id="start_chat">Open Chat</button>
            
        </div><!--#o }}}-->
    </div>

    <div id="inputs"><!--{{{1-->
        <div class="element input-ticket">
            <label for="ticket">Ticket #</label>
            <div class="input">
                <input type="text" name="ticket" id="ticket" size="4" class="ticket"/>
            </div>
        </div>
        <div class="element input-callerphone">
            <label for="callerphone">Caller ID</label>
            <div class="input">
                <input type="text" name="callerphone" id="callerphone" size="12" class="phone"/>
            </div>
        </div>
        <div class="element input-phone">
            <label for="phone">Phone</label>
            <div class="input">
                <input type="text" name="phone" id="phone" size="12" class="phone"/>
            </div>
        </div>
        <div class="element input-username">
            <label for="username">Username</label>
            <div class="input">
                <input type="text" name="username" id="username" size="12" class="username"/>
            </div>
        </div>
        <div class="element input-firstname">
            <label for="firstname">First name</label>
            <div class="input">
                <input type="text" name="firstname" id="firstname" size="10"/>
            </div>
        </div>
        <div class="element input-lastname">
            <label for="lastname">Last name</label>
            <div class="input">
                <input type="text" name="lastname" id="lastname" size="10"/>
            </div>
        </div>
        <div class="element input-serviceaddress">
            <label for="serviceaddress">Service address</label>
            <div class="input">
                <input type="text" name="serviceaddress" id="serviceaddress" size="27"/>
            </div>
            <label for="aptunit">Apt #</label>
            <div class="input">
                <input type="text" name="aptunit" id="aptunit" class="aptunit" size="5"/>
                <input type="button" class="not-an-apartment" value="Not an apartment"/>
            </div>
            <label for="servicezip">Zip code</label>
            <div class="input">
                <input type="text" name="servicezip" id="servicezip" size="5" class="zip"/>
            </div>
        </div>
        <div class="element input-servicecity">
            <label for="servicecity">City</label>
            <div class="input">
                <input type="text" name="servicecity" id="servicecity" size="5" class="email"/>
            </div>
        </div>
        <div class="element input-billingemail">
            <label for="billingemail">Billing Email</label>
            <div class="input">
                <input type="text" name="billingemail" id="billingemail" size="5" class="email"/>
            </div>
        </div>
        <div class="element input-email">
            <label for="email">Email</label>
            <div class="input">
                <input type="text" name="email" id="email" size="20" class="email"/>
            </div>
        </div>
        <div class="element input-password">
            <label for="password">Password</label>
            <div class="input">
                <input type="text" name="password" id="password" size="20" class="password"/>
            </div>
        </div>
        <div class="element input-customer">
            <label for="customer">Account #</label>
            <div class="input">
                <input type="text" name="customer" id="customer" size="6" class="account"/>
            </div>
        </div>
        <div class="element input-accountpassword">
            <label for="accountpassword">Password</label>
            <div class="input">
                <input type="text" name="accountpassword" id="accountpassword" size="6" class="password"/>
            </div>
        </div>
        <div class="element input-balance">
            <label for="balance">Balance</label>
            <div class="input">
                <input type="text" name="balance" id="balance" size="6" class="balance"/>
            </div>
        </div>
        <div class="element input-service">
            <label for="service">Service</label>
            <div class="input">
                <input type="text" name="service" id="service" size="15"/>
            </div>
        </div>
        <div class="element input-node">
            <label for="node">Node</label>
            <div class="input">
                <input type="text" name="node" id="node" size="6"/>
            </div>
        </div>
        <div class="element input-tncplan">
            <label for="tncplan">TNC Plan</label>
            <div class="input">
                <select name="tncplan" id="tncplan">
                    <option value="">&mdash; Select one &mdash;</option>
                    <option value="128">75 Mbs - $29.95/month</option>
                </select>
            </div>
        </div>
        <div class="element input-winfieldplan">
            <label for="winfieldplan">Winfield Plan</label>
            <div class="input">
                <select name="winfieldplan" id="winfieldplan">
                    <option value="">&mdash; Select one &mdash;</option>
                    <option value="59">250 MB/day - $20/month</option>
                    <option value="60">500 MB/day - $25/month</option>
                    <option value="61">Bulk (unlimited) - $25/month</option>
                </select>
            </div>
        </div>
        <div class="element input-baileyplan">
            <label for="baileyplan">Bailey Plan</label>
            <div class="input">
                <select name="baileyplan" id="baileyplan">
                    <option value="">&mdash; Select one &mdash;</option>
                    <option value="178">Apt 10 - $19.95 per month</option>
                    <option value="195">Light Usage - $29.95 per month</option>
                    <option value="196">Medium Usage - $49.95 per month</option>
                    <option value="194">Heavy Usage - $59.95 per month</option>
                    <option value="168">Medium Prepay - $500 one time (20% savings!)</option>
                    <option value="169">Heavy Prepay - $600 one time (20% savings!)</option>
                </select>
            </div>
        </div>
        <div class="element input-ip">
            <label for="ip">IP address</label>
            <div class="input">
                <input type="text" name="ip" id="ip" size="15" class="ip"/>
            </div>
        </div>
        <div class="element input-company">
            <label for="company">Company</label>
            <div class="input">
                <input type="text" name="company" id="company" size="10"/>
            </div>
        </div>
        <div class="element input-activated">
            <label for="activated">Activated On</label>
            <div class="input">
                <input type="date" name="activated" id="activated" size="10"/>
            </div>
        </div>
        <div class="element input-deactivated">
            <label for="deactivated">Deactivated On</label>
            <div class="input">
                <input type="date" name="deactivated" id="deactivated" size="10"/>
            </div>
        </div>
        <div class="element input-calltime">
            <label for="calltime">Time of call</label>
            <div class="input">
                <input type="text" name="calltime" id="calltime" size="7" class="time"/>
            </div>
        </div>
        <div class="element input-hour">
            <label for="hour">Desired hour</label>
            <select name="hour" id="hour">
              <option value="">&mdash; Select one &mdash;</option>
              <option value="09">9:00  AM</option>
              <option value="10">10:00 AM</option>
              <option value="11">11:00 AM</option>
              <option value="12">12:00 PM</option>
              <option value="13">1:00  PM</option>
              <option value="14">2:00  PM</option>
              <option value="15">3:00  PM</option>
              <option value="16">4:00  PM</option>
              <option value="17">5:00  PM</option>
            </select>
        </div>
        <div class="element input-date">
            <label for="date">Desired date</label>
            <div class="input">
                <input type="date" name="date" id="date" size="20" class="date"/>
            </div>
        </div>
        <div class="element input-sendtech">
            <label for="sendtech">Send Tech</label>
            <div class="input">
                <input type="text" name="sendtech" id="sendtech" size="20" class="sendtech"/>
            </div>
        </div>
        <div class="element input-messagetype">
            <label for="messagetype">Type of message</label>
            <div class="input">
                <select name="messagetype" id="messagetype">
                    <option value="">&mdash; Select one &mdash;</option>
                    <option>Technical</option>
                    <option>Sales</option>
                    <option>Web hosting</option>
                    <option>Billing and accounts</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
        <div class="element input-forwhom">
            <label for="forwhom">Message is for</label>
            <div class="input">
                <select name="forwhom" id="forwhom">
                    <option value="">Anyone</option>
                    <option>Tony</option>
                    <option>Peter</option>
                    <option>Thomas</option>
                    <option>Kevin</option>
                    <option>Kristin</option>
                    <option>Mike Thrash</option>
                    <option>Scott Thrash</option>
                    <option>Darren (Champaign Computers)</option>
                    <option>Tammy</option>
                </select>
            </div>
        </div>
        <div class="element input-problem">
            <label for="problem">Problem Type</label>
            <div class="input">
                <textarea name="problem" id="problem" rows="3" cols="30"></textarea>
            </div>
        </div>
        <div class="element input-message">
            <label for="message">Message</label>
            <div class="input">
                <textarea name="message" id="message" rows="4" cols="30"></textarea>
            </div>
        </div>
        <div class="element input-pingtime">
            <label for="pingtime">Ping time</label>
            <div class="input">
                <input type="text" name="pingtime" id="pingtime" size="10" value="0"/>
            </div>
        </div>
        <div class="element input-speedtestdown">
            <label for="speedtestdown">Speedtest Download</label>
            <div class="input">
                <input type="text" name="speedtestdown" id="speedtestdown" size="10" value="0"/>
            </div>
        </div>
        <div class="element input-speedtestup">
            <label for="speedtestup">Speedtest Upload</label>
            <div class="input">
                <input type="text" name="speedtestup" id="speedtestup" size="10" value="0"/>
            </div>
        </div>
        <div class="element input-hasrouter">
            <label for="hasrouter">Has router</label>
            <div class="input">
                <select name="hasrouter" id="hasrouter">
                    <option>Don't know</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
        <div class="element input-phonetype">
            <label for="phonetype">Phone type</label>
            <div class="input">
                <select name="phonetype" id="phonetype">
                    <option selected disabled>Phone Type</option>
                    <option selected="selected">Grandstream</option>
                    <option>Polycom</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
        <div class="element input-switchip">
            <label for="switchip">Switch IP</label>
            <div class="input">
                <input type="text" name="switchip" id="switchip" size="15"/>
            </div>
        </div>
        <div class="element input-switchport">
            <label for="switchport">Switch Port</label>
            <div class="input">
                <input type="text" name="switchport" id="switchport" size="3"/>
            </div>
        </div>
        <div class="element input-minimumspeed">
            <div class="input">
                <input type="hidden" name="minimumspeed" id="minimumspeed" />
            </div>
        </div>
        <div class="element input-routerwifi">
          <label for"routerwifi">Problem</label>
          <div class="input">
            <select name="routerwifi" id="routerwifi">
              <option value="direct" selected>Direct connection</option>
              <option value="wired">Router wired</option>
              <option value="wifi">Router WiFi</option>
              <option value="volowifi">Provided WiFi</option>
            </select>
          </div>
        </div>
        <div class="element input-webproblemtype">
          <label for"webproblemtype">Problem</label>
          <div class="input">
            <select name="webproblemtype" id="webproblemtype">
              <option value="down">No service</option>
              <option value="slow">Slow service</option>
              <option value="comcast">Xfinity</option>
            </select>
          </div>
        </div>
        <div class="element input-onecomputer">
            <label for="onecomputer">Computers Impacted</label>
            <div class="input">
                <select name="onecomputer" id="onecomputer">
                    <option>Don't know</option>
                    <option>Only have one</option>
                    <option>One affected, one or more not affected</option>
                    <option>More than one, but not all</option>
                    <option>All affected</option>
                </select>
            </div>
        </div>
        <div class="element input-callin">
            <label for="callin">Calling In</label>
            <div class="input">
                <input type="checkbox" name="callin" id="callin" defaultValue="callin" value="callin" />
            </div>
        </div>
        <div class="element input-callout">
            <label for="callout">Calling out</label>
            <div class="input">
                <input type="checkbox" name="callout" id="callout" value="callout" />
            </div>
        </div>
        <div class="element input-voipreg">
            <label for="voipreg">Line Registered</label>
            <div class="input">
                <input type="checkbox" name="voipreg" id="voipreg" value="yes" />
            </div>
        </div>
        <div class="element input-referredby">
            <label for="referredby">Heard about from or referred by</label>
            <div class="input">
                <input type="text" name="referredby" id="referredby" size="30"/>
            </div>
        </div>
        <div class="element input-urgency">
            <label for="urgency">Urgency</label>
            <div class="input">
                <select name="urgency" id="urgency">
                    <option>Standard</option>
                    <option>Today</option>
                    <option>Immediate</option>
                </select>
            </div>
        </div>
        <div class="element input-cancelagain">
            <label for="cancelagain">Cancel another service</label>
            <div class="input">
                <select name="cancelagain" id="cancelagain" >
                    <option>No</option>
                    <option>Yes</option>
                </select>
            </div>
        </div>
        <div class="element input-retrieve">
            <label for="retrieve">Make Retrieval Ticket</label>
            <div class="input">
                <select name="retrieve" id="retrieve" >
                    <option>No</option>
                    <option>Yes</option>
                </select>
            </div>
        </div>
        <div class="element input-aptservice">
            <label for="aptservice">Service level</label>
            <div class="input">
                <select name="aptservice" id="aptservice">
                    <option selected>Choose Service Level</option>
                    <option value="189">Light</option>
                    <option value="190">Medium</option>
                    <option value="192">Heavy</option>
                    <option value="188">Apt 10</option>
                </select>
            </div>
        </div>
        <div class="element input-ncservice">
            <label for="ncservice">Service level</label>
            <div class="input">
                <select name="ncservice" id="ncservice">
                    <option selected>Choose Service Level</option>
                    <option value="203">Light</option>
                    <option value="204">Medium</option>
                    <option value="202">Heavy</option>
                    <option value="188">Apt 10</option>
                </select>
            </div>
        </div>
        <div class="element input-servicestart">
            <label for="servicestart">Service start date</label>
            <div class="input">
                <input type="date" name="servicestart" id="servicestart" size="20" class="servicestart"/>
            </div>
        </div>
        <div class="element input-operator">
            <label for="operator">Operator</label>
            <div class="input">
                <input type="text" name="operator" id="operator" size="15" value="<?= $operator ?>" />
            </div>
        </div>
    </div><!--#inputs }}}-->

</div>

<!-- JSXC Javascript
<script src="jsxc/lib/jquery.min.js"></script>
<script src="jsxc/lib/jquery.ui.min.js"></script>
<script src="jsxc/lib/jquery.slimscroll.js"></script>
<script src="jsxc/lib/jquery.fullscreen.js"></script>
<script src="jsxc/lib/jsxc.dep.js"></script>
<script src="jsxc/jsxc.js"></script>
<script src="jsxc.volo.js"></script>

<!-- JSXC Stylesheets -->
<link href="jsxc/css/jquery-ui.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- link href="jsxc/css/jquery.mCustomScrollbar.css" media="all" rel="stylesheet" type="text/css" / -->
<link href="jsxc/css/jsxc.css" media="all" rel="stylesheet" type="text/css" />
<link href="jsxc/css/jsxc.webrtc.css" media="all" rel="stylesheet" type="text/css" />
<link href="jsxc.volo.css" media="all" rel="stylesheet" type="text/css" />
-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
//<![CDATA[
var screens = {};
screens['1404lincolninfo'] = {
    title: "Chateau Normand",
    body: "<p>Good news Volo's internet service is being provided to your unit as an included amenity. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. <b>Do not use a modem or modem/router combo device</b>, our service is provided directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>Additionally WiFi is provided. Each unit has it's own network and your landlord should have the information to get you signed on.</p>\n\n<p>The internet at your location is very fast, so to take full advantage of the service you will need to get a router that is capable of 1000 megabits on all its ports, and supports 802.11AC wi-fi.</p>\n\n<p>Your service should be active now, you don't need to sign up.  If you pay anything for the service, you'd pay that directly to Chateau Normand along with your rent.</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['account'] = {
    title: "Account",
    body: "<p>Before I can access your information, I need to verify your account.</p>\n\n<p>Could you tell me your last name, address, and password? Or, if you know your IP address, I can use that.</p>\n\n<p class=\"dont-say\">The account password is printed on the statements at the top right under the account number</p>\n\n"
    ,buttons: {robot: "Check for account"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname?','lastname','company?','serviceaddress','aptunit','servicezip','password'],['ip','password']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,password: 1,company: 1}
};
screens['autopay'] = {
    title: "ACH signup",
    body: "<p>You can find instructions on signing up for autopay on the Volo website at: <span class=\"url\">volo.net/ach</span></p>\n\n<p>You'll need to fill out and mail in the form you find there.</p>\n"
    ,buttons: {conclude: "conclude"}
    ,buttonOrder: ['conclude']
};
screens['badactor'] = {
    title: "Account Suspended ",
    body: "<p>You account has been <strong>%MESSAGE</strong>. Our system shows you owe <strong>%PASTDUEB</strong>. If you would like to make it current, I can take a credit card payment now, but there will be a 5% convience fee. You may also come to our store at 822 Pioneer St and pay with check or cash, or mail us a check. However, I cannot restore your account until we receive a payment.</p>\n\n<p class='dont-say'>The total with the convience fee is %CCFEE.</p>\n<p class='dont-say'>If the customer chooses to make a payment click here: <a href=http://volo.net/payment>volo.net/payment</a></p>\n"
    ,buttons: {conclude: "Continue"}
    ,buttonOrder: ['conclude']
};
screens['badpassword'] = {
    title: "Invalid password",
    body: "It doesn't look like that's the right password. Can you try another?\n\n"
    ,buttons: {conclude: "No",drupaladdemail: "Retry"}
    ,buttonOrder: ['drupaladdemail','conclude']
};
screens['badticket'] = {
    title: "Couldn't find ticket",
    body: "I couldn't find a ticket with that number. Are you sure of the number?\nIf not, I can try to find the ticket.\n\n"
    ,buttons: {findtickets: "Try to find ticket",robot: "Look up status"}
    ,buttonOrder: ['robot','findtickets']
    ,requires: [['ticket']]
    ,requiresSet: {ticket: 1}
};
screens['baileyproblem'] = {
    title: "Reset Switch",
    body: "I'm going to reset the switch you're connected to, and then we'll see if you can connect.\n\n<script type=\"text/javascript\">\n    $(function() {\n        $('#v-ticket').val('');\n    });\n<"+"/script>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['customer'],['username'],['serviceaddress']]
    ,requiresSet: {serviceaddress: 1,customer: 1,username: 1}
};
screens['baileysignup'] = {
    title: "Bailey Apts Sign Up",
    body: "%MESSAGE\n"
    ,buttons: {robot: "Sign Up"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','email','phone?','serviceaddress','aptunit','servicezip','baileyplan']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,baileyplan: 1,lastname: 1,phone: 1,email: 1}
};
screens['browsertest'] = {
    title: "Run browser test",
    body: "[screen:browsertestcore]\n"
    ,buttons: {conclude: "Worked",custreboot: "Didn't work"}
    ,buttonOrder: ['custreboot','conclude']
};
screens['browsertest2'] = {
    title: "Run browser test 2",
    body: "<p>Test their connection to N. Y. Times dot com:</p>\n\n<ol>\n    <li>Say: Open up your web browser. (Internet Explorer, Firefox, or Safari)</li>\n    <li>Wait for the browser to be open. If it takes more than 60 seconds or is too confusing, skip to \"When did you first notice the problem?\"</li>\n    <li>Say: Type nytimes.com into the Address Bar, but don't press Enter yet.  Spell nytimes.com \"n y times dot com\"</li>\n    <li>Wait for them to be done typing.</li>\n    <li>Say: Press Enter now, and tell me when the page has finished loading.</li>\n    <li>Press [button here?] NYT load time: seconds</li>\n    <li>When the page has loaded, press</li>\n    <li>If timer reaches 60 seconds, press and move on.</li>\n</ol>\n\n"
    ,buttons: {conclude: "Worked",robot: "Didn't work"}
    ,buttonOrder: ['conclude','robot']
};
screens['browsertestcore'] = {
    title: "Test web browser connection",
    body: "<p>Let's test your connection to <span class=\"url\">google.com</span>:</p>\n<p>Open up your web browser: Internet Explorer, Firefox, or Safari.</p>\n\n<p class=\"dont-say\">Wait for the browser to be open. If it takes more than 60 seconds or is too confusing, click \"Didn't work\"</p>\n\n<p>Type <span class=\"url\">google.com</span> into the Address Bar, but don't press Enter yet.</p>\n\n<p class=\"dont-say\">Wait for them to be done typing.</p>\n\n<p>Press Enter now, and tell me when the page has finished loading.</p>\n\n<p class=\"dont-say\">Press <input type=\"button\" value=\"Start\" class=\"start-timer\"/>.\nWhen the page has loaded, press <input type=\"button\" value=\"Stop\" class=\"stop-timer\"/><br/>\nIf timer reaches 60 seconds, press \"Didn't work\" and move on.</p>\n\n<script type=\"text/javascript\">\n    var timeoutID;\n    $(function() {\n        $('input.start-timer').click(function() {\n            timeoutID=window.setTimeout('updateTimer()', 1000);\n        });\n        $('input.stop-timer').click(function() {\n            window.clearTimeout(timeoutID);\n            $('#v-googleloadtime').val($('div.screen:last-child div.input-googleloadtime input').val());\n        });\n    });\n\n    function updateTimer() {\n        $('div.screen:last-child div.input-googleloadtime input').val(parseInt($('div.screen:last-child div.input-googleloadtime input').val())+1);\n        timeoutID=window.setTimeout('updateTimer()', 1000);\n    }\n<"+"/script>\n"
    ,requires: [['googleloadtime']]
    ,requiresSet: {googleloadtime: 1}
};
screens['bwtempup'] = {
    title: "Increase bandwidth temporarily",
    body: "<p>I'll increase your bandwidth for one day, but I can only do this once.</p>\n\n"
    ,buttons: {robot: "Perform upgrade"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname?','lastname','company?','serviceaddress','aptunit','servicezip'],['ip']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,company: 1}
};
screens['bwuldlupgrade'] = {
    title: "Increase Flag Point Permanently",
    body: "<p>I'm going to increase how much bandwidth our system expects you to use permanently</p>\n"
    ,buttons: {robot: "robot"}
    ,buttonOrder: ['robot']
    ,requires: [['username'],['ip']]
    ,requiresSet: {ip: 1,username: 1}
};
screens['bwupgrade'] = {
    title: "Upgrade bandwidth permanently",
    body: "<p class=\"dont-say\">Confirm that the customer would like to purchase a permanent\nupgrade of 250 megabytes per month for an additional $10 per month.</p>\n\n"
    ,buttons: {robot: "robot"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname?','lastname','company?','serviceaddress','aptunit','servicezip'],['ip']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,company: 1}
};
screens['bypassrouter'] = {
    title: "Volo connection working",
    body: "%MESSAGE\n\n<p>Lets try bypassing your router. Please unplug your the cable going from the Volo equipment or ethernet port to your router, and connect the cable directly from the wall to your computer.</p>\n\n<p class=\"dont-say\">The customer may need to leave the phone to do this.</p>\n\n"
    ,buttons: {conclude: "Worked",custreboot: "Didn't work or No Router - Reboot computer"}
    ,buttonOrder: ['custreboot','conclude']
};
screens['bypassrouterspeedtest'] = {
    title: "Bypass Router",
    body: "<p>For the most accurate test we need to bypass your router and plug your computer directly into the Volo connection. Please unplug your the cable going from the Volo equipment or ethernet port to your router, and connect the cable directly from the wall to your computer.</p>\n\n<p class=\"dont-say\">The customer may need to leave the phone to do this.</p>\n\n"
    ,buttons: {speedtest: "No router or bypassed",routerresetspeedtest: "Unable to bypass"}
    ,buttonOrder: ['speedtest','routerresetspeedtest']
};
screens['callinstall'] = {
    title: "Forward to sales rep",
    body: "<p class=\"dont-say\">Forward the call to Ray at ext 709</p>\n\n<p class=\"dont-say ticket-tell\">Please tell him this is regarding ticket\n<strong class=\"ticket-tell-number\">_</strong>.</p>\n\n<script type=\"text/javascript\">\n    if($('#v-ticket').val()) $('.ticket-tell-number').html($('#v-ticket').val());\n    else $('p.ticket-tell').hide();\n<"+"/script>\n\n"
    ,buttons: {conclude: "conclude",robot: "No one answered"}
    ,buttonOrder: ['robot','conclude']
};
screens['calltech'] = {
    title: "Forward to technician",
    body: "%MESSAGE\n\n<p class=\"dont-say\">Send a message to the Volo Hangout Chat asking the question. If you don't get answer within 60 seconds, you can call the following numbers for urgent calls. Otherwise let the caller know we will reach out to them by the next business day.</p>\n\n<p class=\"dont-say\">Tony at <strong>(217) 898-8669</strong>.</p>\n\n<p class=\"dont-say\">Peter at <strong>(217)721-3893</strong>.</p>\n\n<p class=\"dont-say ticket-tell\">Please tell him this is regarding ticket\n<strong class=\"ticket-tell-number\">_</strong>. If there is a ticket.</p>\n\n<script type=\"text/javascript\">\n    if($('#v-ticket').val()) $('.ticket-tell-number').html($('#v-ticket').val());\n    else $('p.ticket-tell').hide();\n<"+"/script>\n\n"
    ,buttons: {conclude: "conclude",cantreachtech: "No one answered",robot: "Update/Make Ticket"}
    ,buttonOrder: ['robot','cantreachtech','conclude']
    ,requires: [['ticket?','message','eta','operator']]
    ,requiresSet: {operator: 1,eta: 1,ticket: 1,message: 1}
};
screens['cancelservice'] = {
    title: "Cancel Service",
    body: "<p>When would you like the service to end? Can you tell me why you're cancelling service?</p>\n<p class=\"dont-say\">Use the message field to record the reason why the customer is cancelling.</p>\n<p class=\"dont-say\">Change retrieve to \"yes\" if you are cancelling STDSRV, or any WRLS service.</p>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['service','deactivated','message?','retrieve?','cancelagain?']]
    ,requiresSet: {retrieve: 1,cancelagain: 1,deactivated: 1,service: 1,message: 1}
};
screens['cancelservicepickservice'] = {
    title: "Choose a service",
    body: "\n[screen:pickaservice]\n\n<script type=\"text/javascript\">\n    $('div.screen-cancelservicepickservice dd').hide();\n    $('div.screen-cancelservicepickservice dt').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-cancelservicepickservice dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        $(this).parents('div.screen').find('div.input input').add('#v-service').val(\n            $(this).parents('dt').attr('service')\n        );\n        robot_check();\n        return(false);\n    });\n<"+"/script>\n"
    ,buttons: {robot: "Edit this service"}
    ,buttonOrder: ['robot']
    ,requires: [['service']]
    ,requiresSet: {service: 1}
};
screens['cancelservicestart'] = {
    title: "Change Service",
    body: "[screen:findservices]\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['customer'],['serviceaddress','aptunit','servicezip']]
    ,requiresSet: {servicezip: 1,aptunit: 1,serviceaddress: 1,customer: 1}
};
screens['cantreachtech'] = {
    title: "You called and no one answered",
    body: "<p>I can't reach a technician right now, but we'll look into the problem and resolve it as soon as we can. If our technicians need something from you, they'll call you.</p>\n\n<p>Feel free to call back anytime with your ticket number for a status update.</p>\n\n"
    ,buttons: {conclude: "conclude"}
    ,buttonOrder: ['conclude']
};
screens['captivatedunit'] = {
    title: "Captivated unit",
    body: "<p>Your unit has been captivated by our system.</p>\n\n<p>If you try to open a website on a phone, tablet, or computer you should be redirected to our portal. If this doesn't work or you don't have access to one of those devices I can uncapture it</p>\n\n"
    ,buttons: {conclude: "Conclude",robot: "Uncaptivate"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1}
};
screens['changeservice'] = {
    title: "Make changes to this service",
    body: "<p>What changes would you like to make?</p>\n\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['service','activated?','deactivated?']]
    ,requiresSet: {activated: 1,deactivated: 1,service: 1}
};
screens['changeservicepickservice'] = {
    title: "Choose a service",
    body: "\n[screen:pickaservice]\n\n<script type=\"text/javascript\">\n    $('div.screen-changeservicepickservice dd').hide();\n    $('div.screen-changeservicepickservice dt').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-changeservicepickservice dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        $(this).parents('div.screen').find('div.input input').add('#v-service').val(\n            $(this).parents('dt').attr('service')\n        );\n        robot_check();\n        return(false);\n    });\n<"+"/script>\n"
    ,buttons: {robot: "Edit this service"}
    ,buttonOrder: ['robot']
    ,requires: [['service']]
    ,requiresSet: {service: 1}
};
screens['changeservicestart'] = {
    title: "Change Service",
    body: "[screen:findservices]\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['customer'],['serviceaddress','aptunit','servicezip']]
    ,requiresSet: {servicezip: 1,aptunit: 1,serviceaddress: 1,customer: 1}
};
screens['changeservicetnc'] = {
    title: "Make changes to this service",
    body: "<p>%MESSAGE</p>\n\n<p class=\"dont-say\">Format the date as YYYY-MM-DD</p>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['service','activated?','deactivated?','tncplan']]
    ,requiresSet: {activated: 1,deactivated: 1,tncplan: 1,service: 1}
};
screens['changeservicewinfield'] = {
    title: "Make changes to this service",
    body: "<p>What changes would you like to make?</p>\n\n<p class=\"dont-say\">Format the date as YYYY-MM-DD</p>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['service','activated?','deactivated?','winfieldplan']]
    ,requiresSet: {activated: 1,deactivated: 1,winfieldplan: 1,service: 1}
};
screens['checkcoverage'] = {
    title: "Check coverage",
    body: "Let's see what the coverage is like in your area.\n\n"
    ,buttons: {voloinfo_nosched: "Skip to About Volo",robot: "Check coverage"}
    ,buttonOrder: ['robot','voloinfo_nosched']
    ,requires: [['serviceaddress','aptunit','servicezip']]
    ,requiresSet: {servicezip: 1,aptunit: 1,serviceaddress: 1}
};
screens['cochranesinfo'] = {
    title: "Cochranes",
    body: "<p>Cochranes Apartments is providing Volo's gigabit fiber internet to your unit as an included amenity. The provided service provides speeds up to 1 gigabit (1000mbps), just about the fastest service in the country. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is proved directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port or the WiFi and start enjoying it!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['comcast'] = {
    title: "Xfinity",
    body: "<p>If you see an Xfinity login that means you are connected to a Comcast/Xfinity modem. Those will not work Volo's service.</p>\n\n<p>We provide our service through ethernet ports. They will look like phone jacks with the same shape and tabbed style connector but are a little bigger. You can connect a computer directly to the port or use a router, but not a router/modem combo.</p>\n\n<p>If you want to come to our office, we sell routers for $75 or we can come install it for $125. You are free to use any brand router bought from any store, and there are cheaper options available.</p>\n<p class=\"dont-say\">Our address 822 Pioneer St, Champaign IL. Hours are 9-6 Mon-Fri</p>\n\n"
    ,buttons: {root: "Finished",routerticket: "Router visit"}
    ,buttonOrder: ['root','routerticket']
};
screens['conclude'] = {
    title: "Anything else?",
    body: "<p>%MESSAGE</p>\n\n<script type=\"text/javascript\">\n  $('.screen-conclude').load(function() {\n    var ticket = $('#v-ticket').val();\n    if (ticket) {\n      console.log(\"ticket: \"+ticket);\n      $('#conclude > div.screen-body').html(\"<p id='unique123'>stuff</p>\");\n    }\n  });\n<"+"/script>\n\n<div name=\"ticketconclude\" id=\"ticketconclude\"></div>\n\n<p>Is there anything further I can help you with today?</p>\n\n"
    ,buttons: {root: "Yes",robot: "No"}
    ,buttonOrder: ['root','robot']
    ,requires: [['username?','ticket?','schedule']]
    ,requiresSet: {ticket: 1,schedule: 1,username: 1}
};
screens['coveragegood'] = {
    title: "Good Coverage",
    body: "<p>It looks like we have good coverage in your area.</p>\n\n<p>Would you like to learn more about our services?</p>\n\n"
    ,buttons: {conclude: "Neither",voloinfo: "Learn more",schedule: "Schedule install"}
    ,buttonOrder: ['voloinfo','schedule','conclude']
};
screens['coveragenone'] = {
    title: "No Coverage",
    body: "<p>It looks like we do not yet cover your area.</p>\n\n<p>Would you like to learn more about Volo anyway?</p>\n\n"
    ,buttons: {voloinfo_nosched: "Yes",conclude: "No"}
    ,buttonOrder: ['conclude','voloinfo_nosched']
};
screens['coverageretry'] = {
    title: "Try coverage check again",
    body: "<p>I couldn't place your address on our coverage map.</p>\n\n<p>I can try again, or I can forward your call to someone who can tell\nyou more about what areas we cover. I can also tell you more about\nthe services Volo offers.</p>\n\n<p class=\"dont-say\">Please ask for the caller's name if you need to forward the call to a sales rep.</p>\n\n"
    ,buttons: {voloinfo_nogeo: "Skip to About Volo",callinstall: "callinstall",robot: "Check coverage"}
    ,buttonOrder: ['robot','voloinfo_nogeo','callinstall']
    ,requires: [['firstname?','lastname?','serviceaddress','aptunit','servicezip']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1}
};
screens['coveragesome'] = {
    title: "Some Coverage",
    body: "<p>It looks like we have some coverage in your area, but we'll a technician to make sure the signal is strong enough.</p>\n\n<p>Would you like to learn more about our services?</p>\n\n"
    ,buttons: {conclude: "Neither",schedulesurvey: "Schedule technician",voloinfo: "Learn more"}
    ,buttonOrder: ['voloinfo','schedulesurvey','conclude']
};
screens['cpmbulkinfo'] = {
    title: "Campus Property Management",
    body: "<p>Campus Property Management is providing Volo's gigabit fiber internet to your unit as an included amenity. The provided service provides speeds up to 1 gigabit (1000mbps), just about the fastest service in the country. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is proved directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port and start enjoying it!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['cpmvpinfo'] = {
    title: "Campus Property Management",
    body: "<p>Campus Property Management is providing Volo's internet to your unit as an included amenity. The provided service provides speeds up to 100mpbs, a very fast service. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is proved directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port and start enjoying it!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['createpassword'] = {
    title: "Create Password ",
    body: ""
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['username','password']]
    ,requiresSet: {password: 1,username: 1}
};
screens['custendprobticket'] = {
    title: "File a ticket",
    body: "<p>We believe this is a problem with your equipment, but to be safe, I am going to file a ticket for a technician to look into your problem sometime within the next business day. Please wait for a moment, and I'll have a ticket number for you and will be able to schedule a technician visit.</p>\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','company?','username?','customer?','serviceaddress','aptunit','servicezip','phone','problem?','urgency','ip?','googleloadtime?','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,username: 1,operator: 1,problem: 1,customer: 1,company: 1,googleloadtime: 1}
};
screens['customer'] = {
    title: "Current customer",
    body: "<p>Can you tell me your account number?</p>\n"
    ,buttons: {customer_lookup: "Don't know",customer_verify: "Verify account"}
    ,buttonOrder: ['customer_verify','customer_lookup']
    ,requires: [['customer']]
    ,requiresSet: {customer: 1}
};
screens['customer_verify'] = {
    title: "Verify account",
    body: "<p>Can you tell me your account number?</p>\n"
    ,buttons: {customer_lookup: "Don't know",customer_verify: "Verify account"}
    ,buttonOrder: ['customer_verify','customer_lookup']
    ,requires: [['customer']]
    ,requiresSet: {customer: 1}
};
screens['custreboot'] = {
    title: "Reboot customer's computer",
    body: "<p>We are showing no problems with our service.</p>\n\n<p>There may be a problem with the settings on your computer, or a program running that's preventing you from accessing the Internet.</p>\n\n<p>Please restart your computer.  The way to do this depends on your system, but usually there's an item for it in the Start menu.<br/>\n<span class=\"dont-say\">If the customer can't figure out how to restart their computer, click \"Didn't work - File a ticket\".</span></p>\n\n<p class=\"dont-say\">Wait for the customer's computer to reboot.</p>\n\n"
    ,buttons: {custendprobticket: "Didn't work - file a ticket",conclude: "Worked"}
    ,buttonOrder: ['custendprobticket','conclude']
};
screens['custselftest'] = {
    title: "Tower Working",
    body: "<p>The tower in your area should be working now.</p>\n\n"
    ,buttons: {conclude: "Working",volodown: "Not working"}
    ,buttonOrder: ['volodown','conclude']
};
screens['drupaladdemail'] = {
    title: "Add Email to Account",
    body: "<p>What email address would you like to add to the account?</p>\n"
    ,buttons: {robot: "Add"}
    ,buttonOrder: ['robot']
    ,requires: [['email','customer']]
    ,requiresSet: {email: 1,customer: 1}
};
screens['drupalpass'] = {
    title: "Change Email Password",
    body: "<p>What would you like your new password to be?</p>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['customer','password']]
    ,requiresSet: {password: 1,customer: 1}
};
screens['emailpass'] = {
    title: "Change Email Password",
    body: "<p>What would you like your new password to be?</p>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['email','password']]
    ,requiresSet: {email: 1,password: 1}
};
screens['ethernetcheck'] = {
    title: "Check Physical Connection",
    body: "%MESSAGE\n"
    ,buttons: {conclude: "conclude",robot: "Continue"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['serviceaddress','aptunit','servicezip','switchip','switchport']]
    ,requiresSet: {servicezip: 1,aptunit: 1,serviceaddress: 1,switchport: 1,switchip: 1}
};
screens['faqs'] = {
    title: "Frequently Asked Questions",
    body: "[screen:volospiel]\n\n[screen:volofaq]\n\n"
    ,buttons: {conclude: "continue"}
    ,buttonOrder: ['conclude']
};
screens['fiberfaq'] = {
    title: "",
    body: "<script type=\"text/javascript\">\n    $('dl.fiberfaq dd.fiberfaq').hide();\n    $('dl.fiberfaq dt.fiberfaq').wrapInner('<a href=\"#\"></a>');\n    $('dl.fiberfaq dt.fiberfaq a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n\n<"+"/script>\n\n<p>Our fiber optic internet service runs at 1000 mbps which makes it the among the fastest in the country. Pricing starts at 29.95 per month for the light tier, and all of our users get the full 1000 mbps. By separating our services into usage tiers we can deliver a super fast connection to all our customers.</p>\n\n[screen:usagecalc]\n\n<dl class=\"fiberfaq\">\n<dt class=\"fiberfaq\" question='router'>Can I use my own router?</dt> <!--{{{-->\n<dd class=\"fiberfaq\">\n<p>You are free to use your own router. However, most low end or older routers will not be able\nto keep up with Volo's blazing fast gigabit speed.</p>\n<p>We don't recommend any specific brands, but you want to look for routers marked as gibabit for the WAN or internet port and the LAN or local network ports.</p>\n<p>You can also check www.smallnetbuilder.com--a site that tests routers to see they're as fast as advertised.</p>\n</dd> <!--}}}-->\n<dt class=\"fiberfaq\" question='tiers'>What is the difference between the service tiers?</dt> <!--{{{-->\n<dd class=\"fiberfaq\">\n<p>The difference between the service tiers is how much usage they are designed for. None of the tiers will throttle your speed, cut you off, or charge you for overages, but each tier has a target usage amount. If you exceed than amount more than 3 times in a month, we will ask you to upgrade to an appropriate tier.</p>\n<p>We usually describe our tiers in terms of video streaming because it is the biggest user of bandwidth on the internet.</p>\n<p>Light is plenty for everyday usage and one or two Netflix (or other streaming) movies per day or an equivalent amount of usage.</p>\n<p>Medium is for customers who want to watch up to 12 hours of Netflix (streaming) per day or equivalent amount of usage.</p>\n<p>Heavy is for customers who use more than that.</p>\n<p class='dont-say'>You may need to remind the potential customer that watching a steam on two different devices at the same time counts double (or triple with 3, etc)</p>\n</dd> <!--}}}-->\n<dt class=\"fiberfaq\" question='whytiers'>Why do you have usage based tiers instead of speed based?</dt> <!--{{{-->\n<dd class=\"fiberfaq\">\n<p>Our costs are based on how much total bandwidth you use, not how fast you use it. By separating our tiers into usage levels we can deliver our fastest service to all customers whether they use it a lot or a little.</p>\n<p>By doing this we are able to offer our high tier for only &#36;60 compared to over &#36;100 with some of our competitors, and we can offer 1000 mbps to our light users.</p>\n</dd> <!--}}}-->\n<dt class=\"fiberfaq\" question='overage'>What happens if I go over my tier?</dt> <!--{{{-->\n<dd class=\"fiberfaq\">\n<p>We will not throttle your speed, cut you off, or charge you for overages. Each tier has a target usage amount, and if you exceed than amount more than 3 times in a month, we will ask you to upgrade to an appropriate tier.</p>\n</dd> <!--}}}-->\n<dt class=\"fiberfaq\" question='install'>Installation Cost</dt> <!--{{{-->\n<dd class=\"fiberfaq\">\n<p>Installation cost for a new install is typically &#36;150. That can be waived if you sign up \nfor TV service or sign a 1 year contract for our Heavy Service.</p>\n<p>We also offer a 30 day guarantee. If you're not happy with your service, and \ncancel in the first 30 days, we'll refund your installation fee.</p>\n<p>Some apartments are pre-installed and there is no install fee.</p>\n</dd> <!--}}}-->\n<dt class=\"fiberfaq\" question='price'>How much does Fiber cost?</dt> <!--{{{-->\n<dd class=\"fiberfaq\">\n<p>You can get lightning fast gigabit internet for as little as 29.95 per \nmonth!</p>\n<p class=\"dont-say\">The following table lists all the monthly fees. Add the line free, plus up to one from each section. Except \"other services\", you can add both of those.</p>\n<table>\n<tr>\n<th>Internet Plans</th> <th>Monthly Rate</th>\n</tr>\n<tr>\n<td>Light</td> <td>&#36;29.95</td>\n</tr>\n<tr>\n<td>Medium</td> <td>&#36;49.95</td>\n</tr>\n<tr>\n<td>Heavy</td><td>&#36;59.95</td>\n</tr>\n<tr>\n<th>Phone Plans</th> <th>Monthly Rate</th>\n</tr>\n<tr>\n<td>Unlimited Calling</td> <td>&#36;12.95</td>\n</tr>\n<tr>\n<th>TV Plans</th> <th>Monthly Rate</th>\n</tr>\n<tr>\n<td>Dish Network</td>\n<td>&#36;19.95+</td>\n</tr>\n<tr>\n<td>Direct TV</td>\n<td>&#36;24.95+</td>\n</tr>\n<tr>\n<th>Other Sevices</th>\n<th>Monthly Rate</th>\n</tr>\n<tr>\n<td>Gigabit Router</td>\n<td>&#36;12.00</td>\n</tr>\n<tr>\n<td>Instant Support</td>\n<td>&#36;10.00</td>\n</tr>\n</table>\n</dd> <!--}}}-->\n<dt class=\"fiberfaq\" question='investment'>I want Fiber asap, what can I do?</dt><!--{{{-->\n<dd class=\"fiberfaq\">\n<p>We have an investment club. With a contribution of of &#36;10,000 we will start the permitting process immediately and construction can begin 60-90 days after that. If you'd like to pursue that, I can have somebody call you back.</p>\n</dd> <!--}}}-->\n</dl>\n<!-- \nvi:foldmethod=marker: \n-->\n"
    ,buttons: {conclude: "conclude"}
    ,buttonOrder: ['conclude']
};
screens['findips'] = {
    title: "Change Service",
    body: "<p>I need to look up your account info</p>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['username?','customer?','serviceaddress','aptunit','servicezip']]
    ,requiresSet: {servicezip: 1,aptunit: 1,serviceaddress: 1,customer: 1,username: 1}
};
screens['findpoe'] = {
    title: "Find the Volo termination box",
    body: "<p>Let's try resetting the equipment and see if that restores your service.</p>\n\n<p>You're looking for a small black or white box.  If it's black, it'll be about the size of your thumb and it'll say \"DC  POE  LAN\" on it.  If it's white or off-white it'll be about the size of a bar of soap, and it may say \"CAT-5\" on it.  Can you find that box?</p>\n\n"
    ,buttons: {voloreset: "Yes",nopoeprobticket: "No"}
    ,buttonOrder: ['voloreset','nopoeprobticket']
};
screens['findservices'] = {
    title: "Find Services",
    body: "<p>I need to look up your account info</p>\n\n<p class=\"dont-say\">Address search only works for Town and Country and Winfield customers</p>\n"
    ,requires: [['customer'],['serviceaddress','aptunit','servicezip']]
    ,requiresSet: {servicezip: 1,aptunit: 1,serviceaddress: 1,customer: 1}
};
screens['findticket'] = {
    title: "Find a ticket",
    body: "I can try to look up your most recent ticket.\n"
    ,buttons: {robot: "Check for tickets"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname?','lastname','serviceaddress','aptunit','servicezip'],['ip']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1}
};
screens['findtickets'] = {
    title: "Look up tickets",
    body: "Let me try to find your ticket.\n\n<script type=\"text/javascript\">\n    $(function() {\n        $('#v-ticket').val('');\n    });\n<"+"/script>\n"
    ,buttons: {robot: "Find tickets"}
    ,buttonOrder: ['robot']
    ,requires: [['phone','firstname?','lastname?','serviceaddress?','servicezip?']]
    ,requiresSet: {firstname: 1,servicezip: 1,serviceaddress: 1,lastname: 1,phone: 1}
};
screens['forcetowerreset'] = {
    title: "Tower Reset",
    body: "<p>The test still shows no connection from the tower to your location. I'm going to try restarting the tower now.</p>\n"
    ,buttons: {robot: "Reset Tower"}
    ,buttonOrder: ['robot']
    ,requires: [['ip']]
    ,requiresSet: {ip: 1}
};
screens['goodbye'] = {
    title: "Bye!",
    body: "%MESSAGE\n"
};
screens['greencrestinfo'] = {
    title: "Greencrest",
    body: "`<p>Greencrest apartments is providing Volo's gigabit fiber internet to your unit as an included amenity. The provided service provides speeds up to 1 gigabit (1000mbps), just about the fastest service in the country. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is proved directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port and start enjoying it!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['hardwickinfo'] = {
    title: "Hardwick",
    body: "<p>Hardwick is providing Volo's gigabit fiber internet service to your unit.</p>\n\n<h4>For 401 E University:</h4>\n<p>You can start using it immediately by connecting your computer or router to the ethernet port in your apartment with a label. The label will be a letter followed a number 1 - 24. There will be 3 ports in your apartment, unfortunately the electrician did not wire the building correctly so we have a work around. You are meant to have 2 working ports but there is only one cable run. To work around this we have installed a 3rd port next to the live port which is connected to the port in the other room. If you wish to use only the port in the other room, connect the provided cable between the two ports and plug your computer or router into the last port. If you wish to use both ports you will need a router or switch. With a router plug the internet/WAN/modem port into the live port (again the one with the label) and plug the provided cable from a local port into the other port on the wall. With a switch simply plug both wall ports into any ports on the switch.</p>\n\n<h4>Other locations:</h4>\n<p>You can start using it immediately by connecting your computer or router to the ethernet port in your apartment.</p>\n\n<h4>All locations:</h4>\n<p>Do not use a modem, our service is proved directly through ethernet ports in the wall. \n\n<p>You are a free to use a router, just connect the internet, WAN, or modem port to the wall port with the label. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port and start enjoying it.</p>\n\n<p>The provided service is 1 gigabit for 1000 megabits per second, about the fastest internet available in the country!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['joeallanproblem'] = {
    title: "Problem at Joe Allan Apts",
    body: "<p>Let me take down some information, and we'll run some automatic tests and reset the switch you're connected to.</p>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname?','lastname?','serviceaddress']]
    ,requiresSet: {firstname: 1,serviceaddress: 1,lastname: 1}
};
screens['kennedywilsoninfo'] = {
    title: "Kennedy Wilson",
    body: "<p>Kennedy-Wilson is providing Volo's gigabit fiber internet to your unit as an included amenity. The provided service provides speeds up to 1 gigabit (1000mbps), just about the fastest service in the country. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is proved directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port and start enjoying it!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['lancasterinfo'] = {
    title: "Lancaster and Maywood",
    body: "<p>Volo manages the service for your unit. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is proved directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port and start enjoying it!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['lincolnshireinfo'] = {
    title: "Lincolnshire",
    body: "<p>Lincolnshire is providing Volo's gigabit fiber internet to your unit as an included amenity. The provided service provides speeds up to 1 gigabit (1000mbps), just about the fastest service in the country. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is proved directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port and start enjoying it!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['message'] = {
    title: "Leave a message",
    body: "<p>Let me get some information about what you need.</p>\n<p class=\"dont-say\">UNLESS CALLER IS UNWILLING TO PROVIDE THEM, collect email, account #, service address, apt #, andd zip code.</p>\n"
    ,buttons: {robot: "robot"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','company?','phone','email?','customer?','serviceaddress?','aptunit?','servicezip?','messagetype','forwhom?','urgency','message','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,message: 1,operator: 1,email: 1,forwhom: 1,messagetype: 1,customer: 1,company: 1}
};
screens['mhminfo'] = {
    title: "MHM",
    body: "<p>MHM is providing Volo's gibabit fiber internet service. The provided service supports speeds up to 1 gigabit (1000mbps), and just about the fastest service available anywhere in the US. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is proved directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port and start enjoying it!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['moulinaptsinfo'] = {
    title: "Moulin Apts ",
    body: "<p>Good news Volo's internet service is being provided to your unit as an included amenity. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. <b>Do not use a modem or modem/router combo device</b>, our service is provided directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>Additionally WiFi is provided. Each unit has it's own network and your landlord should have the information to get you signed on.</p>\n\n<p>The internet at your location is very fast, so to take full advantage of the service you will need to get a router that is capable of 1000 megabits on all its ports, and supports 802.11AC wi-fi.</p>\n\n<p>Your service should be active now, you don't need to sign up.  If you pay anything for the service, you'd pay that directly to Moulin Apts along with your rent.</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['mxunoconnectionticket'] = {
    title: "File ticket regarding problem",
    body: "%MESSAGE\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','username?','customer?','phone','serviceaddress','aptunit','servicezip','hasrouter','problem','urgency','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,username: 1,operator: 1,problem: 1,customer: 1,hasrouter: 1}
};
screens['nextchapterinfo'] = {
    title: "Nextchapter Properties",
    body: "<p>Nextchapter Properties is providing Volo's gigabit internet service. The provided service supports speeds up to 1 gigabit (1000mbps), and just about the fastest service available anywhere in the US. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment, or connecting to the provided WiFi network for your unit.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port or the WiFi network provided and start enjoying it.</p>\n\n<p>The provided service is 1 gigabit or 1000 megabits per second, about the fastest internet available in the country!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['noarpsticket'] = {
    title: "File a ticket",
    body: "<p class=\"dont-say\">If during work hours</p>\n<p>There is a connection problem between the equipment on the roof and your computer. I'm going file a ticket and a technician will get back to you by the end of the day.</p>\n<p class=\"dont-say\">If during work hours</p>\n<p>There is a connection problem between the equipment on the roof and your computer. I'm going file a ticket and a technician will get back to you tomorrow.</p>\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','company?','username?','customer?','serviceaddress','aptunit','servicezip','phone','problem?','urgency'],['ip','phone','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,username: 1,operator: 1,problem: 1,customer: 1,company: 1}
};
screens['nopoeprobticket'] = {
    title: "File a ticket",
    body: "<p>Let me try to bring someone else on the line to see what we can do about that.<p>\n\n<p>In case we get disconnected, let me get some contact information from you:<p>\n\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','company?','username?','customer?','serviceaddress','aptunit','servicezip','phone','problem?','urgency'],['ip','phone','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,username: 1,operator: 1,problem: 1,customer: 1,company: 1}
};
screens['noservices'] = {
    title: "No Services",
    body: "<p>No active services were found for this customer number or address.</p>\n\n%MESSAGE\n\n<p class=\"dont-say\">You can click \"<a href=\"#\" class=\"foo\">go back</a>\" and try again,\nor continue and file a ticket with the customer's question.</p>\n\n"
    ,buttons: {problemaccountticket: "problemaccountticket"}
    ,buttonOrder: ['problemaccountticket']
};
screens['notickets'] = {
    title: "No tickets found",
    body: "I wasn't able to find any tickets for you. If you're having a problem with your\nservice, we can try to diagnose it now, or I can see if a technician is available.\n"
    ,buttons: {problemweb: "Diagnose problem",calltech: "calltech"}
    ,buttonOrder: ['calltech','problemweb']
};
screens['opentickets'] = {
    title: "Customer has open tickets ",
    body: "<p>The system is reporting that you have open tickets. Is this the same problem you've been having or should I make a new ticket?</p>\n\n<p class='dont-say'>Click on the make new ticket option if it should be a new ticket. That will clear out the ticket number.</p>\n\n%TICKETS\n\n<script type=\"text/javascript\">\n    $('div.screen-opentickets dd').hide();\n    $('div.screen-opentickets dt').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-opentickets dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        $(this).parents('div.screen').find('div.input input').add('#v-ticket').val(\n            $(this).parents('dt').attr('ticket')\n        );\n        robot_check();\n        return(false);\n    });\n<"+"/script>\n\n<style type=\"text/css\">\n    div.screen-opentickets dl dt a\n    {\n        color: #027AC6;\n        padding: 0.3em;\n    }\n\n    div.screen-opentickets dl dt a:hover\n    {\n        text-decoration: underline;\n        cursor: pointer;\n    }\n</style>\n"
    ,buttons: {problemweb: "Continue "}
    ,buttonOrder: ['problemweb']
    ,requires: [['callerphone?','customer?','ticket?']]
    ,requiresSet: {callerphone: 1,customer: 1,ticket: 1}
};
screens['otherfaq'] = {
    title: "",
    body: "<script type=\"text/javascript\">\n    $('dl.otherfaq dd').hide();\n    $('dl.otherfaq dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.otherfaq dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n\n<dl class=\"otherfaq\">\n<dt question='tv'>Can I get TV with Volo?</dt> <!--{{{-->\n<dd>\n<p>Yes! We have partnered with Direct TV and Dish Network to provide \ntelevision. If you sign up for new service with us, your installation fee\nwill be waived.</p>\n<p>Dish starts at 19.99 per month, and Direct TV starts at 24.99 per month.\nBoth require 2 year contacts.</p>\n</dd> <!--}}}-->\n<dt question='keeptv'>I already have Dish/Direct, can I keep my TV service?</dt> <!--{{{-->\n<dd>\n<p>You can keep your current TV service, but to qualify for a free install, \nyou have to sign up for a new service.</p>\n</dd> <!--}}}-->\n<dt question='phone'>Can I get phone service with Volo</dt> <!--{{{-->\n<dd>\n<p>Yes! Volo offers a VOIP (voice over internet protocol) service. We're able \nto deliver crystal clear call quality using your internet service.</p>\n<p>We sell converter boxes so you can continue to use your current phone, or \nyou can buy an \"internet\" phone from us.</p>\n<p>You can keep your current phone number, and we'll help you transfer it</p>\n</dd> <!--}}}-->\n<dt question='contract'>Does Volo have a contract?</dt> <!--{{{-->\n<dd>\n<p>We don't believe in locking our customers in, so we generally do not have contracts with our customers. If you would like one we can call you back later to discuss that.</p>\n</dd> <!--}}}-->\n<dt question='hosting'>Can I host a server/Get a static IP address?</dt> <!--{{{-->\n<dd>\n<p>Yes! We don't put any limitations on what our customers do with their service (as long as they're in the appropriate tier for bandwidth). All of our fiber and wireless customers get a static IP address.</p>\n</dd> <!--}}}-->\n</dl>\n<!-- \nvi:foldmethod=marker: \n-->\n"
    ,buttons: {conclude: "conclude"}
    ,buttonOrder: ['conclude']
};
screens['overage1'] = {
    title: "First overage",
    body: "<p>Let me first have you open your web browser and go to <span class=\"url\">volo.net/usage</span></p>\n\n<p>I'm happy to increase your allocation for free today if this doesn't happen too often, or if you think you're going to download this much on a regular basis, I can increase your allocation on a permanent basis.</p>\n\n[screen:overageinfo]\n"
    ,buttons: {conclude: "Do nothing",bwupgrade: "Purchase upgrade",bwtempup: "Free temporary upgrade"}
    ,buttonOrder: ['bwupgrade','bwtempup','conclude']
};
screens['overage2'] = {
    title: "Second overage",
    body: "<p>OK, it looks like you're over your allocation again.  Do you know that you can track your usage at <span class=\"url\">volo.net/usage</span>?  This is only the second time you've had a problem. I'd be happy to increase your allocation temporarily, or if you find think you're going to download this much on a regular basis, I can increase your allocation permanently.  The cost for a higher limit is &#36;10 a month for each additional 250 megabytes.</p>\n\n<h4>More overage info</h4>\n[screen:overageinfo]\n"
    ,buttons: {conclude: "Do nothing",overage1: "Info about overages",bwupgrade: "Purchase upgrade",bwtempup: "Free temporary upgrade"}
    ,buttonOrder: ['overage1','bwupgrade','bwtempup','conclude']
};
screens['overage3'] = {
    title: "Third overage",
    body: "<p>Okay, it looks like you're over your allocation again.  Do you know that you can track your usage at <span class=\"url\">volo.net/usage</span>?  This is the third time you've had a problem. I'd be happy to increase your allocation temporarily, or if you're going to download this much on a regular basis, I can increase your allocation permanently.</p>\n\n<h4>More overage info</h4>\n[screen:overageinfo]\n"
    ,buttons: {conclude: "Do nothing",bwupgrade: "Purchase upgrade",bwtempup: "Free temporary upgrade"}
    ,buttonOrder: ['bwupgrade','bwtempup','conclude']
};
screens['overageinfo'] = {
    title: "Overage info",
    body: "<p>Our connection speed is based on the amount of data you've transferred in the past 24 hours, versus the amount you have purchased.  Your allocation, the amount you have purchased, is on the second line of that page: <strong>%LIMIT megabytes</strong>. As you can see from the graph, the amount you've used over the last 24 hours (the blue line) has exceeded the amount that you pay for (the green line).  The cost for a higher limit is &#36;10 a month for each additional 250 megabytes.</p>\n\n<p>You can also give yourself a temporary increase by clicking the \"Use a temporary upgrade\" link at <span class=\"url\">volo.net/usage</span></p>\n\n<h4>Last 24 hours</h4>\n%GRAPH\n\n<h4>Dates of bumps</h4>\n%BUMPS\n"
    ,buttons: {conclude: "Do nothing"}
    ,buttonOrder: ['conclude']
};
screens['overagemany'] = {
    title: "Four more overages",
    body: "<p>Okay, it looks like you're over your allocation again.  Do you know that you can track your usage at <span class=\"url\">volo.net/usage</span>?  This is the %TIMESOVER time you've had a problem, so I'm not able to upgrade your allocation temporarily for free, but I'd be happy to increase your allocation on a permanent basis.</p>\n\n<h4>More overage info</h4>\n[screen:overageinfo]\n"
    ,buttons: {conclude: "Do nothing",bwupgrade: "bwupgrade"}
    ,buttonOrder: ['bwupgrade','conclude']
};
screens['overageuldl'] = {
    title: "Unlimited Overage",
    body: "<p>We monitor all accounts for abnormal activity. Our system has flagged your account becuase of unusually high usage. This means you used more bandwidth than we expected. There are a few possible causes for this. \n\n<p>The first is that your usage pattern was different. For example you watched more netflix that usual. The system uses the past 24 hours as it's measuring period. So usage after this time yesterday is still counting. This is the most common reason. The second is that someone else is using your connection. The third is that your computer has contracted a virus and the virus is using high amounts of bandwidth. These two reasons are rare and should only be considered if you think it's unlikely that you used the bandwidth our system measured.</p>\n\n<p>If it's the first, we can temporaily  or we can permanently tell our system to expect more usage from you.</p>\n\n<p>If you think it's the second or third, the first two steps are to change the password for your wireless (if you have it) and run a virus check on all your computers.</p>\n\n<h4>Last 24 hours</h4>\n%GRAPH\n"
    ,buttons: {conclude: "Do nothing",bwuldlupgrade: "Permanent Increase",bwtempup: "Temporary Increase",message: "Technician Investigate"}
    ,buttonOrder: ['bwtempup','bwuldlupgrade','message','conclude']
};
screens['pastdue'] = {
    title: "Past Due Balance ",
    body: "<p>Before I continue troubleshooting, I have to inform you that our system is showing a past due balance on your account. The amount due is %PASTDUEB, and it's showing %PASTDUEM months past due</p>\n"
    ,buttons: {problemweb: "Continue "}
    ,buttonOrder: ['problemweb']
};
screens['paypal'] = {
    title: "Paypal",
    body: "<script type=\"text/javascript\">\n    $('#servicezip').on(\"ready load change\", function () {\n        $zip = $('#servicezip').val();\n        $.ajax({\n            url: 'https://volo.net/secure/cs/v.cgi',\n            data: {q: \"dump_json silent report city_state_from_zip \"+$zip, raw: 1, type: \"application/json\"},\n            success: function(data, status) {\n                $('#city').val(data[0]);\n                $('#state').val(data[1]);\n            },\n            error: function(data, status) {\n                console.log(status);\n            },\n        });\n    });\n<"+"/script>\n\n%MESSAGE\n\n<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" id=\"volo-payment-form\" accept-charset=\"UTF-8\" target=\"_blank\"><div>\n<p>Payments are processed via PayPal. You can pay by credit card at PayPal, or if you already have a PayPal account, you can pay by the other methods they offer.</p>\n\n<p>There is a 5% convenience fee that will be added when you submit. It will appear on the statement as a tax.</p>\n\n<p>If you are suspended and you pay the amount owed in full, you will be unsuspended by the end of the call.</p>\n\n<p style=\"strong;\">Make sure you tell the customer the full amount that will be paid (displayed once you get to the paypal page).</p>\n\n<div class=\"element input-billingemail required\">\n    <label for=\"billingemail\">Email</label>\n    <div class=\"input\">\n        <input id=\"billingemail\" class=\"\" type=\"text\" size=\"10\" name=\"email\">\n    </div>\n</div>\n<div class=\"element input-firstname required\">\n    <label for=\"firstname\">First name</label>\n    <div class=\"input\">\n        <input id=\"firstname\" class=\"\" type=\"text\" size=\"10\" name=\"first_name\">\n    </div>\n</div>\n<div class=\"element input-lastname required\">\n    <label for=\"lastname\">Last name</label>\n    <div class=\"input\">\n        <input id=\"lastname\" class=\"\" type=\"text\" size=\"10\" name=\"last_name\">\n    </div>\n</div>\n<div class=\"element input-callerphone required\">\n    <label for=\"callerphone\">Phone</label>\n    <div class=\"input\">\n        <input id=\"callerphone\" class=\"\" type=\"text\" size=\"10\" name=\"night_phone_a\">\n    </div>\n</div>\n<div class=\"element input-customer required\">\n    <label for=\"customer\">Account #</label>\n    <div class=\"input\">\n        <input id=\"customer\" class=\"account\" type=\"text\" size=\"6\" name=\"custom\">\n    </div>\n</div>\n<div class=\"element input-serviceaddress required\">\n    <label for=\"serviceaddress\">Service address</label>\n    <div class=\"input\">\n        <input id=\"serviceaddress\" class=\"ac_input\" type=\"text\" size=\"40\" name=\"address1\" autocomplete=\"off\">\n    </div>\n</div>\n<div class=\"element input-servicezip required\">\n    <label for=\"servicezip\">Zip code</label>\n    <div class=\"input\">\n        <input id=\"servicezip\" class=\"zip\" type=\"text\" size=\"5\" name=\"zip\">\n    </div>\n</div>\n<div class=\"element input-servicecity required\">\n    <label for=\"servicecity\">City</label>\n    <div class=\"input\">\n        <input id=\"servicecity\" class=\"city\" type=\"text\" size=\"15\" name=\"city\">\n    </div>\n</div>\n<div class=\"element input-estate required\">\n    <label for=\"state\">State</label>\n    <div class=\"input\">\n        <input id=\"state\" class=\"state\" type=\"text\" size=\"5\" name=\"state\" value=\"IL\">\n    </div>\n</div>\n<div class=\"element input-balance required\">\n    <label for=\"customer\">Amount</label>\n    <div class=\"input\">\n        <input id=\"balance\" class=\"account\" type=\"text\" size=\"6\" name=\"amount\">\n    </div>\n</div>\n<input type=\"hidden\" id=\"item_name\" name=\"item_name\" value=\"Volo Internet\" />\n<input type=\"hidden\" name=\"business\" value=\"paypal@volo.net\" />\n<input type=\"hidden\" name=\"cmd\" value=\"_xclick\" />\n<input type=\"hidden\" name=\"no_shipping\" value=\"1\" />\n<input type=\"hidden\" name=\"tax\" value=\"0\" />\n<input type=\"hidden\" name=\"tax_rate\" value=\"5\" />\n<input type=\"hidden\" name=\"lc\" value=\"US\" />\n<input type=\"hidden\" name=\"address_override\" value=\"1\" />\n<input type=\"hidden\" name=\"return\" value=\"https://volo.net/payment/return\" />\n<input type=\"hidden\" name=\"cancel_return\" value=\"https://volo.net/payment/failed\" />\n<input type=\"hidden\" name=\"rm\" value=\"2\" />\n<input type=\"submit\" id=\"edit-submit\" name=\"op\" value=\"Proceed to PayPal\" class=\"form-submit\" />\n</div></form>\n"
    ,buttons: {conclude: "conclude"}
    ,buttonOrder: ['conclude']
};
screens['pickaip'] = {
    title: "Choose an IP",
    body: "<p>Here are the IP addresses I found:</p>\n\n<p class='dont-say'>If the street addresses are the same and the customer doesn't know which one to pick choose the one with the highest bandwidth</p>\n\n%IPS\n\n<script type=\"text/javascript\">\n    $('div.screen-pickaip dd').hide();\n    $('div.screen-pickaip dt').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-pickaip dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        $(this).parents('div.screen').find('div.input input').add('#v-ip').val(\n            $(this).parents('dt').attr('ip')\n        );\n        robot_check();\n        return(false);\n    });\n<"+"/script>\n\n<style type=\"text/css\">\n    div.screen-pickaip dl dt a\n    {\n        color: #027AC6;\n        padding: 0.3em;\n    }\n\n    div.screen-pickaip dl dt a:hover\n    {\n        text-decoration: underline;\n        cursor: pointer;\n    }\n</style>\n"
    ,buttons: {robot: "Bump this IP"}
    ,buttonOrder: ['robot']
    ,requires: [['ip']]
    ,requiresSet: {ip: 1}
};
screens['pickaservice'] = {
    title: "Choose a service",
    body: "<p>Here are the services I found:</p>\n\n<p class='dont-say'>Enter the service id number. You can click on them to have it auto fill the box.</p>\n\n%SERVICES\n\n<script type=\"text/javascript\">\n    $('div.screen-pickaservice dd').hide();\n    $('div.screen-pickaservice dt').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-pickaservice dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        $(this).parents('div.screen').find('div.input input').add('#v-service').val(\n            $(this).parents('dt').attr('service')\n        );\n        robot_check();\n        return(false);\n    });\n<"+"/script>\n\n<style type=\"text/css\">\n    div.screen-pickaservice dl dt a\n    {\n        color: #027AC6;\n        padding: 0.3em;\n    }\n\n    div.screen-pickaservice dl dt a:hover\n    {\n        text-decoration: underline;\n        cursor: pointer;\n    }\n</style>\n"
    ,buttons: {robot: "Edit this service"}
    ,buttonOrder: ['robot']
};
screens['pickasite'] = {
    title: "Choose a site",
    body: "<p>Here are the sites I found:</p>\n\n<p class=\"dont-say\">If the street addresses are the same and the customer doesn't know which IP to choose, pick the one with the highest bandwidth.</p>\n\n%SITES\n\n<script type=\"text/javascript\">\n    $('div.screen-pickasite dd').hide();\n    $('div.screen-pickasite dt').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-pickasite dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        $(this).parents('div.screen').find('div.input input').add('#v-ip').val(\n            $(this).parents('dt').attr('ip')\n        );\n        robot_check();\n        return(false);\n    });\n<"+"/script>\n\n<style type=\"text/css\">\n    div.screen-pickasite dl dt a\n    {\n        color: #027AC6;\n        padding: 0.3em;\n    }\n\n    div.screen-pickasite dl dt a:hover\n    {\n        text-decoration: underline;\n        cursor: pointer;\n    }\n</style>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['ip?']]
    ,requiresSet: {ip: 1}
};
screens['pickaticket'] = {
    title: "Choose a ticket",
    body: "[screen:pickaticketcore]\n\n<p class=\"dont-say\">Check with the caller if one of these is the right ticket. Click on a ticket to show details or select it.</p>\n"
    ,buttons: {robot: "Look up this ticket"}
    ,buttonOrder: ['robot']
    ,requires: [['ticket']]
    ,requiresSet: {ticket: 1}
};
screens['pickaticketcore'] = {
    title: "Choose a ticket",
    body: "<p>Here are the tickets I found:</p>\n\n%TICKETS\n\n<script type=\"text/javascript\">\n    $('div.screen-pickaticket dd').hide();\n    $('div.screen-pickaticket dt').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-pickaticket dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        $(this).parents('div.screen').find('div.input input').add('#v-ticket').val(\n            $(this).parents('dt').attr('ticket')\n        );\n        robot_check();\n        return(false);\n    });\n<"+"/script>\n\n<style type=\"text/css\">\n    div.screen-pickaticket dl dt a\n    {\n        color: #027AC6;\n        padding: 0.3em;\n    }\n\n    div.screen-pickaticket dl dt a:hover\n    {\n        text-decoration: underline;\n        cursor: pointer;\n    }\n</style>\n"
    ,buttons: {robot: "Look up this ticket"}
    ,buttonOrder: ['robot']
};
screens['potentialbaileyapts'] = {
    title: "Potential Bailey Customer",
    body: "<p>At Bailey Apartments, we offer superfast fiber internet. The pricing starts at &#36;19.95 per month. There are no installation or setup fees.</p>\n\n<p>You should find an ethernet port in your unit you can plug into.  Once plugged in, our system will usually direct you to a web page that will allow you to sign up and choose a package.  If that doesn't work, I can also sign you up over the phone.</p>\n\n<p>We offer 4 tiers of service at your location: Apartment10, Light, Medium and Heavy service.  Light, Medium and Heavy service all run at up to 1000Mbps (one Gigabit) and are differentiated based on how much you use the service, which I can go over with you in a few moments.</p>\n\n<p>As a special offer to certain apartments, including yours, we also offer a budget-friendly lower-speed service called Aparment 10. This has the same target usage amount as the Light service, but runs at 10Mbps instead of the full gigabit speed of the other services. Because of that, Apartment 10 service is adequate for typical web surfing and email use, but won't work well for you if you watch much online video.</p>\n\n<p>Light service costs $29.95 per month.  Medium service costs $49.95 per month.  Heavy service costs $59.95 per month.Apartment 10 service costs $19.95 per month. You can also prepay for a year for Medium or Heavy service and get 2 months free, which makes the Heavy service cost what Medium normally would cost.</p>\n\n<p>Due to internal wiring at 111 S Lincoln Ave and 911 W Springfield Ave, those buildings are limited to 100Mbps. All other Bailey buildings have 1000Mbps available.</p>\n\n<dl class=\"alacartefaq\">\n<dt>Service FAQs (click to open)</dt>\n<dd>\n  <dl class=\"alacartefaq\">\n    <dt>What does an ethernet port look like?</dt>\n    <dd>It's like a phone port except larger</dd>\n    <dt>Does your service need a modem?</dt>\n    <dd>No our service doesn't use modems. There should be an ethernet port you can plug into directly.</dd>\n    <dt>Can I use a router with your service?</dt>\n    <dd>Yes, our service is compatible with routers. It should work with any router you have.</dd>\n    <dt>Does Volo sell routers?</dt>\n    <dd>Yes. Volo sells routers for $50, if you want the wireless configured for your devices, it's $85</dd>\n    <dt>I need help configuring my wireless router</dt>\n    <dd>Volo can setup a router for you for $50.</dd>\n    <dt question='tiers'>What is the difference between the service tiers?</dt>\n    <dd>\n    <p>Our fiber pricing is designed to give even light users affordable access to the highest speeds.  All our high speed fiber packages offer speeds up to 1000mbps; they only differ in the expected customer usage level. We do not enforce hard data limits--you do not have to worry about overage charges or speed throttling.  Instead, each tier of service has a target usage level; if you go over the target usage more than three times in a month, we may call and ask you to upgrade to tier of service more appropriate for your usage.</p>\n    <p>The difference between the service tiers is how much usage they are designed for. We usually describe our tiers in terms of video streaming because it is the biggest user of bandwidth on the internet:</p>\n    <p>Light is plenty for everyday usage and one or two Netflix (or other streaming) movies per day or an equivalent amount of usage.</p>\n    <p>Medium is for customers who want to watch up to 12 hours of Netflix or other streaming video per day, or equivalent other usage.</p>\n    <p>Heavy is for customers who use more than that.</p>\n    <p class='dont-say'>You may need to remind the potential customer that watching a steam on two different devices at the same time counts double (or triple with 3, etc)</p>\n    </dd>\n    <dt question='whytiers'>Why do you have usage based tiers instead of speed based?</dt>\n    <dd>\n    <p>Our costs are based on how much total bandwidth you use, not how fast you use it. By separating our tiers into usage levels we can deliver our fastest service to all customers whether they use it a lot or a little.</p>\n    <p>By doing this we are able to offer our high tier for only &#36;60 compared to over &#36;100 with some of our competitors, and we can offer 1000 mbps to our light users.</p>\n    </dd>\n    <dt question='overage'>What happens if I go over my tier?</dt>\n    <dd>\n    We will not throttle your speed, cut you off, or charge you for overages. Each tier has a target usage amount, and if you exceed than amount more than 3 times in a month, we will ask you to upgrade to an appropriate tier.\n    </dd>\n  </dl>\n</dd>\n</dl>\n\n[screen:usagecalc]\n\n<script type=\"text/javascript\">\n    $('dl.alacartefaq dd').hide();\n    $('dl.alacartefaq dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.alacartefaq dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n"
    ,buttons: {conclude: "Nevermind",robot: "Signup"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','email','baileyplan','servicestart','message?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,baileyplan: 1,lastname: 1,phone: 1,message: 1,operator: 1,email: 1,servicestart: 1}
};
screens['potentialcove'] = {
    title: "Potential Parkland Cove Customer",
    body: "<p>Parkland Cover offers complimentary Volo internet service.</p>\n\n<p>You don't have to sign up or pay anything extra. To start using your service, just plug an ethernet cable into the jack in your apartment and connect to either your computer or router.</p>\n\n<p>If your address is 1302 Mariner, 3701 Harbor Estates, or 1202 Myrtle Beach, we may need to install the ethernet jack. The construction company made a mistake and put phone jacks in instead. If you don't have an ethernet jack we'll schedule a time to install that.</p>\n\n<h4>FAQs:</h4>\n<dl>\n<dt>What does an ethernet port look like?</dt>\n<dd>It's like a phone port except larger</dd>\n<dt>Does your service need a modem?</dt>\n<dd>No our service doesn't use modems. There should be an ethernet port you can plug into directly.</dd>\n<dt>Can I use a router with your service?</dt>\n<dd>Yes, our service is compatible with routers. It should work with any router you have.</dd>\n<dt>Does Volo sell routers?</dt>\n<dd>Yes. Volo sells routers for $50, if you want the wireless configured for your devices, it's $85</dd>\n<dt>I need help configuring my wireless router</dt>\n<dd>Volo can setup a router for you for $35.</dd>\n</dl>\n"
    ,buttons: {conclude: "Finished ",message: "No Jack"}
    ,buttonOrder: ['message','conclude']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','operator']]
    ,requiresSet: {operator: 1,firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1}
};
screens['potentialcpmalacarte'] = {
    title: "Potential A La Carte Customer",
    body: "<h4>608 E CHALMERS ONLY:</h4>\n<p>We have a building wide wifi system here. Connet to the network labeled \"CMI Broadband\" and use the password \"go illini go\".<p>\n<p class='dont-read'>The wifi network and password don't have quotes, but the password DOES have spaces.</p>\n<h4>END OF 608 E CHALMERS SECTION</h4>\n\n<p>At that CPM apartment we offer speeds up to 1000mb/s (or gigabit) using advanced fiber optic.</p>\n\n<p>A few buildings are limited to 100Mbps due to internal wiring. Right now this is <b>1010 W Stoughton St</b> </p>\n\n<p>We offer month-to-month pricing starting at $19.95. There is no installation cost because no installation needs to be done. There is an ethernet port in the unit you can plug into and start using immediately.</p>\n\n<dl class=\"alacartefaq\">\n<dt>Service FAQs</dt>\n<dd>\n<dt>What does an ethernet port look like?</dt>\n<dd>It's like a phone port except larger</dd>\n<dt>Does your service need a modem?</dt>\n<dd>No our service doesn't use modems. There should be an ethernet port you can plug into directly.</dd>\n<dt>Can I use a router with your service?</dt>\n<dd>Yes, our service is compatible with routers. It should work with any router you have.</dd>\n<dt>Does Volo sell routers?</dt>\n<dd>Yes. Volo sells routers for $50, if you want the wireless configured for your devices, it's $85</dd>\n<dt>I need help configuring my wireless router</dt>\n<dd>Volo can setup a router for you for $50.</dd>\n</dd>\n</dl>\n\n[screen:usagecalc]\n\n<p>As a special offer to certain apartments (including yours), we also have an Aparment 10 tier. This has the same target usage amount as the Light tier, but runs at 10mbps. So it's the only tier that doesn't get the full speed. It costs 19.95.</p>\n\n<script type=\"text/javascript\">\n    $('dl.alacartefaq dd').hide();\n    $('dl.alacartefaq dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.alacartefaq dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n"
    ,buttons: {conclude: "Nevermind",robot: "Signup"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','email','cpmservice','message?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,message: 1,operator: 1,email: 1,cpmservice: 1}
};
screens['potentialcustomerstart'] = {
    title: "Potential Customer/New Customer Info",
    body: "%MESSAGE\n\n<p>That's fantastic! We are super proud of our gigabit fiber internet and our great rural wireless services. Let me see if you are in our coverage area:</p>\n\n\n<p class=\"dont-say\">You can ask for more information at this time, but only the address is needed</p>\n"
    ,buttons: {robot: "Look up services"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname?','lastname?','serviceaddress','aptunit','servicezip','phone?','email?']]
    ,requiresSet: {email: 1,firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1}
};
screens['potentialhousing'] = {
    title: "Potential Housing Customer",
    body: "<script type=\"text/javascript\">\n    $('div.screen-potentialhousing dd').hide();\n    $('div.screen-potentialhousing dt').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-potentialhousing dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n\n<p>Volo offers internet service in your buiding. Speeds up to 10 megabits per second for $19.95 per month.</p>\n\n<dl>\n<dt question='tv'>Can I get TV with Volo</dt> <!--{{{-->\n<dd>\nVolo is offering to install over the air (OTA or broadcast) television. There are 14 channels available locally. Volo will provide you with a high definition DVR to record shows and watch them on your schedule.\n</dd> <!--}}}-->\n<dt question='channels'>What channels are offered</dt> <!--{{{-->\n<dd>\n<table>\n<tr>\n<td>Number</td><td>Network</td><td>Station</td>\n</tr>\n<tr>\n<td>3.1</td><td>CBS</td><td>WCIA</td>\n</tr>\n<tr>\n<td>3.2</td><td>WCIX</td><td>WCIA</td>\n</tr>\n<tr>\n<td>12.1</td><td>PBS</td><td>WILL</td>\n</tr>\n<tr>\n<td>12.2</td><td>WORLD</td><td>WILL</td>\n</tr>\n<tr>\n<td>12.3</td><td>CREATE</td><td>WILL</td>\n</tr>\n<tr>\n<td>15.1</td><td>ABC</td><td>WICD</td>\n</tr>\n<tr>\n<td>17.1</td><td>NBC</td><td>WAND</td>\n</tr>\n<tr>\n<td>17.2</td><td>Cozi TV</td><td>WAND</td>\n</tr>\n<tr>\n<td>23.1</td><td>CW</td><td>WBUI</td>\n</tr>\n<tr>\n<td>23.2</td><td>This TV</td><td>WBUI</td>\n</tr>\n<tr>\n<td>27.1</td><td>FOX</td><td>WCCU</td>\n</tr>\n<tr>\n<td>27.2</td><td>Me-TV</td><td>WCCU</td>\n</tr>\n</table>\n</dd> <!--}}}-->\n<dt question='phone'>Can I get phone service with Volo</dt> <!--{{{-->\n<dd>\n<p>Yes! Volo offers a VOIP (voice over internet protocol) service. We're able \nto deliver crystal clear call quality using your internet connection.</p>\n<p>We sell converter boxes so you can continue to use your current phone, or \nyou can buy an \"internet\" phone from us.</p>\n<p>You can keep your current phone number, and we'll help you transfer it</p>\n</dd> <!--}}}-->\n<dt question='router'>Can I use my own router?</dt> <!--{{{-->\n<dd>\n<p>You are free to use your own router. However, most routers will not be able\nto keep up with Volo's blazing fast gigabit speed.</p>\n</dd> <!--}}}-->\n<dt question='install'>Installation Cost</dt> <!--{{{-->\n<dd>\n<p>Installation cost is $50 for internet, $40 for phone. TV is freely available if you have a digital tv or already own a converter box. Volo sells the converter boxes for $50 and can add DVR functionality for $150.</p>\n</dd> <!--}}}-->\n</dl>\n\n<p class='dont-say'>You can schedule an install for these buildings if you feel comfortable. Otherwise just file the ticket and let them know they'll get a call back to schedule it.</p>\n<!-- \nvi:foldmethod=marker: \n-->\n"
    ,buttons: {robot: "File Ticket"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','referredby?','message?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,message: 1,operator: 1,referredby: 1}
};
screens['potentialinstall'] = {
    title: "Potential Customer",
    body: "<p>Check coverage area by looking at the <a class='coverage' href=\"https://volo.net/coverage-map\" target=\"_blank\">coverage map</a>.</p>\n\n<p class=\"dont-say\">Find the address on the coverage map and then read the appropriate section from below.</p>\n\n<p class=\"dont-say\">Backbone Fiber is generally not for residential customers and has install costs in the thousands. For apartment buildings in this area, let residents know it's not on our schedule to install this year, and that schedule is already set.</p>\n\n<dl>\n<dt category='wireless' class=\"menu\">Wireless Services</dt>\n<dd class='menu'>[screen:wirelessfaq]</dd>\n<dt category='fiber' class='menu'>Fiber Services</dt>\n<dd class='menu'>[screen:fiberfaq]</dd>\n<dt category='other' class=\"menu\">Other Questions</dt>\n<dd class='menu'>[screen:otherfaq]</dd>\n</dl>\n\n<p class=\"dont-say\">If the customer gives an address that is an apartment inform them that they will need their landlord's permission for us to do an install. This involves an antenna on the roof for wireless, and similar installation as comcast with fiber.</p>\n\n<script type=\"text/javascript\">\n    $('div.screen-potentialinstall dd.menu').hide();\n    $('div.screen-potentialinstall dt.menu').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-potentialinstall dt.menu a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n\n    function addressLink() {\n        $address = $('#serviceaddress').val() + \"+\" + $('#servicezip').val();\n        $('div.screen-potentialinstall a.coverage').attr(\"href\", \"https://volo.net/coverage-map?address=\"+$address);\n    }\n\n    $('#serviceaddress').change(addressLink());\n    $('#servicezip').change(addressLink());\n<"+"/script>\n"
    ,buttons: {robot: "File Ticket"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','email?','referredby?','message?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,message: 1,operator: 1,email: 1,referredby: 1}
};
screens['potentialjoeallan'] = {
    title: "Potential Joe Allan Customer",
    body: "<p>Joe Allan apartments offers complimentary Volo internet service.</p>\n\n<p>You don't have to sign up or pay anything extra. To start using your service, just plug an ethernet cable into the jack in your apartment and connect to either your computer or router.</p>\n\n<h4>FAQs:</h4>\n<dl>\n<dt>What does an ethernet port look like?</dt>\n<dd>It's like a phone port except larger</dd>\n<dt>Does your service need a modem?</dt>\n<dd>No our service doesn't use modems. There should be an ethernet port you can plug into directly.</dd>\n<dt>Can I use a router with your service?</dt>\n<dd>Yes, our service is compatible with routers. It should work with any router you have.</dd>\n<dt>Does Volo sell routers?</dt>\n<dd>Yes. Volo sells routers for $50, if you want the wireless configured for your devices, it's $85</dd>\n<dt>I need help configuring my wireless router</dt>\n<dd>Volo can setup a router for you for $35.</dd>\n</dl>\n"
    ,buttons: {conclude: "Finished "}
    ,buttonOrder: ['conclude']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','operator']]
    ,requiresSet: {operator: 1,firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1}
};
screens['potentialmxu'] = {
    title: "Potential A La Carte Customer",
    body: "<p>Good news, Volo's service is already installed to your building. I just need to get some information to sign you up.</p>\n\n<p>We offer month-to-month pricing starting at $19.95. There is no installation cost because no installation needs to be done. There is an ethernet port in the unit you can plug into and start using as soon as your account is activated.</p>\n\n<dl class=\"alacartefaq\">\n<dt>Service FAQs</dt>\n<dd>\n<dt>What does an ethernet port look like?</dt>\n<dd>It's like a phone port except larger.</dd>\n<dt>Does your service need a modem?</dt>\n<dd>No our service doesn't use modems. There should be an ethernet port you can plug into directly.</dd>\n<dt>Can I use a router with your service?</dt>\n<dd>Yes, our service is compatible with routers. It should work with any router you have. However, better routers will deliver faster speeds. We recommend getting a router rated for gigabit speeds and with the AC WiFi designation.</dd>\n<dt>Does Volo sell routers?</dt>\n<dd>Yes. Volo sells routers for $50, if you want the wireless configured for your devices, it's $85</dd>\n<dt>I need help configuring my wireless router</dt>\n<dd>Volo can setup a router for you for $50.</dd>\n</dd>\n</dl>\n\n[screen:usagecalc]\n\n<script type=\"text/javascript\">\n    $('dl.alacartefaq dd').hide();\n    $('dl.alacartefaq dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.alacartefaq dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n"
    ,buttons: {conclude: "Nevermind",robot: "Signup"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','email','aptservice','message?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,aptservice: 1,lastname: 1,phone: 1,message: 1,operator: 1,email: 1}
};
screens['potentialnextchapter'] = {
    title: "Potential A La Carte Customer",
    body: "<p>At your location, we offer superfast internet starting at &#36;19.95 per month. There are no installation or setup fees.</p>\n\n<p>You should find an ethernet port in your unit you can plug into.  Once plugged in, our system will usually direct you to a web page that will allow you to sign up and choose a package.  If that doesn't work, I can also sign you up over the phone.</p>\n\n<p>We offer 4 tiers of service at your location: Apartment10, Light, Medium and Heavy service.  Light, Medium and Heavy service all run at up to 1000Mbps (one Gigabit) and are differentiated based on how much you use the service, which I can go over with you in a few moments.</p>\n\n<p>As a special offer to certain apartments, including yours, we also offer a budget-friendly lower-speed service called Aparment 10. This has the same target usage amount as the Light service, but runs at 10Mbps instead of the full gigabit speed of the other services. Because of that, Apartment 10 service is adequate for typical web surfing and email use, but won't work well for you if you watch much online video.</p>\n\n<p>Light service costs $29.95 per month.  Medium service costs $49.95 per month.  Heavy service costs $59.95 per month.Apartment 10 service costs $19.95 per month. You can also prepay for a year for Medium or Heavy service and get 2 months free, which makes the Heavy service cost what Medium normally would cost.</p>\n\n<p>Due to internal wiring at 111 S Lincoln Ave and 911 W Springfield Ave, those buildings are limited to 100Mbps. All other Bailey buildings have 1000Mbps available.</p>\n\n<dl class=\"alacartefaq\">\n<dt>Service FAQs (click to open)</dt>\n<dd>\n  <dl class=\"alacartefaq\">\n    <dt>What does an ethernet port look like?</dt>\n    <dd>It's like a phone port except larger</dd>\n    <dt>Does your service need a modem?</dt>\n    <dd>No our service doesn't use modems. There should be an ethernet port you can plug into directly.</dd>\n    <dt>Can I use a router with your service?</dt>\n    <dd>Yes, our service is compatible with routers. It should work with any router you have.</dd>\n    <dt>Does Volo sell routers?</dt>\n    <dd>Yes. Volo sells routers for $50, if you want the wireless configured for your devices, it's $85</dd>\n    <dt>I need help configuring my wireless router</dt>\n    <dd>Volo can setup a router for you for $50.</dd>\n    <dt question='tiers'>What is the difference between the service tiers?</dt>\n    <dd>\n    <p>Our fiber pricing is designed to give even light users affordable access to the highest speeds.  All our high speed fiber packages offer speeds up to 1000mbps; they only differ in the expected customer usage level. We do not enforce hard data limits--you do not have to worry about overage charges or speed throttling.  Instead, each tier of service has a target usage level; if you go over the target usage more than three times in a month, we may call and ask you to upgrade to tier of service more appropriate for your usage.</p>\n    <p>The difference between the service tiers is how much usage they are designed for. We usually describe our tiers in terms of video streaming because it is the biggest user of bandwidth on the internet:</p>\n    <p>Light is plenty for everyday usage and one or two Netflix (or other streaming) movies per day or an equivalent amount of usage.</p>\n    <p>Medium is for customers who want to watch up to 12 hours of Netflix or other streaming video per day, or equivalent other usage.</p>\n    <p>Heavy is for customers who use more than that.</p>\n    <p class='dont-say'>You may need to remind the potential customer that watching a steam on two different devices at the same time counts double (or triple with 3, etc)</p>\n    </dd>\n    <dt question='whytiers'>Why do you have usage based tiers instead of speed based?</dt>\n    <dd>\n    <p>Our costs are based on how much total bandwidth you use, not how fast you use it. By separating our tiers into usage levels we can deliver our fastest service to all customers whether they use it a lot or a little.</p>\n    <p>By doing this we are able to offer our high tier for only &#36;60 compared to over &#36;100 with some of our competitors, and we can offer 1000 mbps to our light users.</p>\n    </dd>\n    <dt question='overage'>What happens if I go over my tier?</dt>\n    <dd>\n    We will not throttle your speed, cut you off, or charge you for overages. Each tier has a target usage amount, and if you exceed than amount more than 3 times in a month, we will ask you to upgrade to an appropriate tier.\n    </dd>\n  </dl>\n</dd>\n</dl>\n\n[screen:usagecalc]\n\n<script type=\"text/javascript\">\n    $('dl.alacartefaq dd').hide();\n    $('dl.alacartefaq dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.alacartefaq dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n"
    ,buttons: {conclude: "Nevermind",robot: "Signup"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','email','ncservice','servicestart','message?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,message: 1,operator: 1,email: 1,servicestart: 1,ncservice: 1}
};
screens['potentialshlens'] = {
    title: "Potential A La Carte Customer",
    body: "<p>At your location, we offer superfast internet starting at &#36;19.95. There are no installation or setup fees.</p>\n\n<p>You should find an ethernet port in the unit you can plug into and you can sign up through the capture portal or I can sign you up over the phone.</p>\n\n<p>We offer 4 tiers of service at your location. Light, Medium, Heavy all run at 1000Mbps (or Gigabit) and are differentiated based on how much you use the service. As a special offer to certain apartments (including yours), we also have an Aparment 10 tier. This has the same target usage amount as the Light tier, but runs at 10Mbps not the full gigabit speed the rest do.</p>\n\n\n<dl class=\"alacartefaq\">\n<dt>Service FAQs (click to open)</dt>\n<dd>\n  <dl class=\"alacartefaq\">\n    <dt>What does an ethernet port look like?</dt>\n    <dd>It's like a phone port except larger</dd>\n    <dt>Does your service need a modem?</dt>\n    <dd>No our service doesn't use modems. There should be an ethernet port you can plug into directly.</dd>\n    <dt>Can I use a router with your service?</dt>\n    <dd>Yes, our service is compatible with routers. It should work with any router you have.</dd>\n    <dt>Does Volo sell routers?</dt>\n    <dd>Yes. Volo sells routers for $50, if you want the wireless configured for your devices, it's $85</dd>\n    <dt>I need help configuring my wireless router</dt>\n    <dd>Volo can setup a router for you for $50.</dd>\n    <dt question='tiers'>What is the difference between the service tiers?</dt>\n    <dd>\n    <p>The difference between the service tiers is how much usage they are designed for. None of the tiers will throttle your speed, cut you off, or charge you for overages, but each tier has a target usage amount. If you exceed than amount more than 3 times in a month, we will ask you to upgrade to an appropriate tier.</p>\n    <p>We usually describe our tiers in terms of video streaming because it is the biggest user of bandwidth on the internet.</p>\n    <p>Light is plenty for everyday usage and one or two Netflix (or other streaming) movies per day or an equivalent amount of usage.</p>\n    <p>Medium is for customers who want to watch up to 12 hours of Netflix (streaming) per day or equivalent amount of usage.</p>\n    <p>Heavy is for customers who use more than that.</p>\n    <p class='dont-say'>You may need to remind the potential customer that watching a steam on two different devices at the same time counts double (or triple with 3, etc)</p>\n    </dd>\n    <dt question='whytiers'>Why do you have usage based tiers instead of speed based?</dt>\n    <dd>\n    <p>Our costs are based on how much total bandwidth you use, not how fast you use it. By separating our tiers into usage levels we can deliver our fastest service to all customers whether they use it a lot or a little.</p>\n    <p>By doing this we are able to offer our high tier for only &#36;60 compared to over &#36;100 with some of our competitors, and we can offer 1000 mbps to our light users.</p>\n    </dd>\n    <dt question='overage'>What happens if I go over my tier?</dt>\n    <dd>\n    We will not throttle your speed, cut you off, or charge you for overages. Each tier has a target usage amount, and if you exceed than amount more than 3 times in a month, we will ask you to upgrade to an appropriate tier.\n    </dd>\n  </dl>\n</dd>\n</dl>\n\n[screen:usagecalc]\n\n<script type=\"text/javascript\">\n    $('dl.alacartefaq dd').hide();\n    $('dl.alacartefaq dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.alacartefaq dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n"
    ,buttons: {conclude: "Nevermind",robot: "Signup"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','email','ncservice','servicestart','message?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,message: 1,operator: 1,email: 1,servicestart: 1,ncservice: 1}
};
screens['potentialsmithapts'] = {
    title: "Potential A La Carte Customer",
    body: "<p>At your location, we offer superfast internet starting at &#36;19.95. There are no installation or setup fees.</p>\n\n<p>You should find an ethernet port in the unit you can plug into and you can sign up through the capture portal or I can sign you up over the phone.</p>\n\n<p>We offer 4 tiers of service at your location. Light, Medium, Heavy all run at 1000Mbps (or Gigabit) and are differentiated based on how much you use the service. As a special offer to certain apartments (including yours), we also have an Aparment 10 tier. This has the same target usage amount as the Light tier, but runs at 10Mbps not the full gigabit speed the rest do.</p>\n\n\n<dl class=\"alacartefaq\">\n<dt>Service FAQs (click to open)</dt>\n<dd>\n  <dl class=\"alacartefaq\">\n    <dt>What does an ethernet port look like?</dt>\n    <dd>It's like a phone port except larger</dd>\n    <dt>Does your service need a modem?</dt>\n    <dd>No our service doesn't use modems. There should be an ethernet port you can plug into directly.</dd>\n    <dt>Can I use a router with your service?</dt>\n    <dd>Yes, our service is compatible with routers. It should work with any router you have.</dd>\n    <dt>Does Volo sell routers?</dt>\n    <dd>Yes. Volo sells routers for $50, if you want the wireless configured for your devices, it's $85</dd>\n    <dt>I need help configuring my wireless router</dt>\n    <dd>Volo can setup a router for you for $50.</dd>\n    <dt question='tiers'>What is the difference between the service tiers?</dt>\n    <dd>\n    <p>The difference between the service tiers is how much usage they are designed for. None of the tiers will throttle your speed, cut you off, or charge you for overages, but each tier has a target usage amount. If you exceed than amount more than 3 times in a month, we will ask you to upgrade to an appropriate tier.</p>\n    <p>We usually describe our tiers in terms of video streaming because it is the biggest user of bandwidth on the internet.</p>\n    <p>Light is plenty for everyday usage and one or two Netflix (or other streaming) movies per day or an equivalent amount of usage.</p>\n    <p>Medium is for customers who want to watch up to 12 hours of Netflix (streaming) per day or equivalent amount of usage.</p>\n    <p>Heavy is for customers who use more than that.</p>\n    <p class='dont-say'>You may need to remind the potential customer that watching a steam on two different devices at the same time counts double (or triple with 3, etc)</p>\n    </dd>\n    <dt question='whytiers'>Why do you have usage based tiers instead of speed based?</dt>\n    <dd>\n    <p>Our costs are based on how much total bandwidth you use, not how fast you use it. By separating our tiers into usage levels we can deliver our fastest service to all customers whether they use it a lot or a little.</p>\n    <p>By doing this we are able to offer our high tier for only &#36;60 compared to over &#36;100 with some of our competitors, and we can offer 1000 mbps to our light users.</p>\n    </dd>\n    <dt question='overage'>What happens if I go over my tier?</dt>\n    <dd>\n    We will not throttle your speed, cut you off, or charge you for overages. Each tier has a target usage amount, and if you exceed than amount more than 3 times in a month, we will ask you to upgrade to an appropriate tier.\n    </dd>\n  </dl>\n</dd>\n</dl>\n\n[screen:usagecalc]\n\n<script type=\"text/javascript\">\n    $('dl.alacartefaq dd').hide();\n    $('dl.alacartefaq dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.alacartefaq dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n"
    ,buttons: {conclude: "Nevermind",robot: "Signup"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','email','ncservice','servicestart','message?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,message: 1,operator: 1,email: 1,servicestart: 1,ncservice: 1}
};
screens['potentialstjoe'] = {
    title: "Potential Customer",
    body: "<p>Check coverage area by looking at the <a class='coverage' href=\"https://volo.net/coverage-map\" target=\"_blank\">coverage map</a>.</p>\n\n<script type=\"text/javascript\">\n    $('div.screen-potentialstjoe dd.menu').hide();\n    $('div.screen-potentialstjoe dt.menu').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-potentialstjoe dt.menu a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n\n<p>We are excited about expanding to the St Joseph area and look forward to having you as a customer. We are entering the area in phases, beginning with the North side of town. From there we will continue our build out and hope to have service to the entire town in the next 12 to 18 months.</p>\n\n<p>If you like, I can explain our services to you now, or we can call you back when we're ready to install your area and go over everything.</p>\n\n<br />\n\n<p class=\"dont-say\">Only read the following if the caller wants. Otherwise just fill out their information and file a ticket.</p>\n\n[screen:fiberfaq]\n"
    ,buttons: {robot: "File Ticket"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','referredby?','message?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,message: 1,operator: 1,referredby: 1}
};
screens['potentialthomasboro'] = {
    title: "Potential Customer",
    body: "<script type=\"text/javascript\">\n#    $('div.screen-potentialthomasboro dd').hide();\n#    $('div.screen-potentialthomasboro dt').wrapInner('<a href=\"#\"></a>');\n#    $('div.screen-potentialthomasboro dt a').click(function() {\n#        var $dd=$(this).parents('dt').next();\n#        if($dd.hasClass('open')) $dd.hide('fast');\n#        else $dd.show('fast');\n#        $dd.toggleClass('open');\n#        return(false);\n#    });\n<"+"/script>\n\n<p>In your area we offer Volo's Superfast Fiber service. This is the fastest residential internet service available in the nation.</p>\n<p>Volo has built a brand new state of the art fiber optic network.</p>\n<p>Other companies offer services with typical speeds in the 8 to 20 megabit \nrange. Volo's Fiber service will be 1000 megabits (also known as \ngigabit).</p>\n<p>So, would you like to pay less money for faster service?</p>\n<p class='dont-say'>This part is optional</p>\n<p>Other companies offer no guaranteed minimum speed--this translates to \nincreased time waiting while pages load, no guarantee that your phone will \nwork or that Netflix will stream at full quality. Volo's services offers \nguaranteed minimum bandwidth from 1mbps (appropriate for voice) and up.</p>\n<dl>\n\n[screen:fiberfaq]\n"
    ,buttons: {robot: "File Ticket"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip','phone','referredby?','message?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,message: 1,operator: 1,referredby: 1}
};
screens['problem'] = {
    title: "Connection problem",
    body: "<p>Lets figure out what's wrong.</p>\n\n<p>This will be just a few moments while we test the connection to your location.</p>\n"
    ,buttons: {robot: "Test connection"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','company?','username?','customer?','serviceaddress','aptunit','servicezip'],['ip']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,username: 1,customer: 1,company: 1}
};
screens['problemaccount'] = {
    title: "Billing or account issue",
    body: "<p>Would you like to make a payment, do you have a billing question, do you want to end a service, or get help with your website account?</p>\n"
    ,buttons: {paypal: "Payment",cancelservicestart: "End Service",problemdrupal: "Volo.net",problemaccountticket: "Billing"}
    ,buttonOrder: ['paypal','problemaccountticket','cancelservicestart','problemdrupal']
};
screens['problemaccountstart'] = {
    title: "Billing and Account problems",
    body: "We have implemented a password system for customers who want to limit who can make changes to their account. Passwords are printed on your statements in the top right section. If you have already set a password please provide it now. If not, we can set one or tell the system you don't want one.\n\nOr if you just want to pay your bill I can process that.\n\n<p class=\"dont-say\">Verify the person knows the password if there is one. If they don't know it, you can still file a ticket and we will call back using another method of verification.</p>\n\n<p class=\"dont-say\">No verification is needed to make a payment</p>\n"
    ,buttons: {paypal: "Pay Bill",problemaccount: "Continue",robot: "Update Password",problemaccountticket: "File Ticket"}
    ,buttonOrder: ['problemaccount','paypal','problemaccountticket','robot']
    ,requires: [['accountpassword?','customer?']]
    ,requiresSet: {customer: 1,accountpassword: 1}
};
screens['problemaccountticket'] = {
    title: "Billing or account issue",
    body: "<p>I'll file a ticket for our account staff to look into the issue. Can I have your account number? It's on your Volo statement.</p>\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['account?','firstname','lastname','company?','username?','customer?','phone','serviceaddress?','servicezip?','problem','urgency','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,serviceaddress: 1,account: 1,lastname: 1,phone: 1,username: 1,operator: 1,problem: 1,customer: 1,company: 1}
};
screens['problematic'] = {
    title: "What kind of problem?",
    body: "<p>What kind of problem are you having?</p>\n\n"
    ,buttons: {problemcomputer: "Computer",problemunknown: "Don't know",problemnetwork: "Network / connection",problemaccount: "Billing / account"}
    ,buttonOrder: ['problemnetwork','problemcomputer','problemaccount','problemunknown']
};
screens['problemcomputer'] = {
    title: "Computer problem",
    body: "<p>Volo doesn't offer support for issues unrelated to its services. There are several companies in the area that may be able to help you, generally on an hourly basis. I can give you a few names and phone numbers if you'd like to contact one.</p>\n\n<p class=\"dont-say\">These are in alphabetical order.</p>\n\n<ul>\n    <li><strong>Champaign Computer</strong> &mdash; (217) 356-9770</li>\n    <li><strong>Doctor Micro</strong> &mdash; (217) 778-8203</li>\n    <li><strong>E.P. Computer</strong> &mdash; (217) 351-7888</li>\n    <li><strong>Geeky Guys</strong> &mdash; (217) 239-7413</li>\n    <li><strong>Simplified Computers</strong> &mdash; (217) 352-5000</li>\n</ul>\n"
    ,buttons: {conclude: "conclude"}
    ,buttonOrder: ['conclude']
};
screens['problemdrupal'] = {
    title: "Problem logging onto volo.net",
    body: "<p>Do you need to add an email address to your account? Do you need your password reset? Or is it another problem?</p>\n"
    ,buttons: {drupalpass: "Password",problemaccountticket: "Other",drupaladdemail: "Add Email"}
    ,buttonOrder: ['drupaladdemail','drupalpass','problemaccountticket']
};
screens['problememail'] = {
    title: "Problem with email",
    body: "<p>Are you having trouble sending email, receiving email, did you forget your password, or is it something else?</p>\n"
    ,buttons: {emailpass: "Password",problemunknown: "Other problem",problememailreceive: "Receiving",problememailsend: "Sending"}
    ,buttonOrder: ['problememailsend','problememailreceive','emailpass','problemunknown']
};
screens['problememailreceive'] = {
    title: "Problem receiving email",
    body: "<p>Usually this is because your email software is having a problem that can be resolved by restarting your software or rebooting your computer. Let's try restarting your email software first. If that doesn't work, try rebooting your computer.</p>\n\n<p class=\"dont-say\">Wait for them to restart their software or computer.</p>\n\n<p>Did that fix the problem?</p>\n"
    ,buttons: {conclude: "Yes",problememailticket: "No"}
    ,buttonOrder: ['conclude','problememailticket']
};
screens['problememailsend'] = {
    title: "Problem sending email",
    body: "<p>Let's check that you've got your email software set up correctly. Are you using Outlook, Outlook Express, Thunderbird, or another program?</p>\n"
    ,buttons: {problememailsend_outlook: "Outlook",problememailsend_oe: "Outlook Express",problememailsend_tb: "Thunderbird",problememailsend_generic: "Other (generic instructions)"}
    ,buttonOrder: ['problememailsend_outlook','problememailsend_oe','problememailsend_tb','problememailsend_generic']
};
screens['problememailsend_generic'] = {
    title: "Outgoing email settings",
    body: "<p>Okay, we need to make sure your outgoing email settings are correct.</p>\n\n<ol>\n    <li>The server name for outgoing mail is <b>volomail.net</b>. Sometimes this will just be called \"SMTP server\".</li>\n    <li>The port number is <b>587</b>, but if you're off the Volo network, you might need to try 925, 25525, or 55525.</li>\n    <li>The outgoing server requires authentication. This may show up under a button or tab labeled \"advanced\" or \"more settings\".</li>\n    <li>You may need to enter your email account name again for authentication.</li>\n</ol>\n\n<p>Can you try sending an email now?</p>\n\n<p class=\"dont-say\">Wait for the caller to try it out...</p>\n\n<p>Did that fix the problem?</p>\n\n"
    ,buttons: {conclude: "Yes",problememailticket: "No"}
    ,buttonOrder: ['conclude','problememailticket']
};
screens['problememailsend_oe'] = {
    title: "Outgoing email for Outlook Express",
    body: "<p>Okay, we need to make sure your outgoing email settings are correct.</p>\n\n<p>Outlook Express:</p>\n<ol>\n    <li>Go to the <strong>Tools</strong> menu and choose <strong>Accounts...</strong></li>\n    <li>Select your Volo account from the list and click <b>Properties</b></li>\n    <li>Select the <b>Servers</b> tab</li>\n    <li>The incoming and outgoing servers should be <b>volomail.net</b></li>\n    <li>Check the box next to <i>My server requires authentication</i> under <i>Outgoing Mail Server</i></li>\n    <li>Select the <b>Advanced</b> tab</li>\n    <li>Change the port number for Outgoing Mail (SMTP) to <strong>587</strong></li>\n    <li>Click <b>OK</b></li>\n    <li>Click <b>Close</b></li>\n</ol>\n\n<p>Can you try sending an email now?</p>\n\n<p class=\"dont-say\">Wait for the caller to try it out...</p>\n\n<p>Did that fix the problem?</p>\n\n"
    ,buttons: {conclude: "Yes",problememailticket: "No"}
    ,buttonOrder: ['conclude','problememailticket']
};
screens['problememailsend_outlook'] = {
    title: "Outgoing email for Outlook",
    body: "<p>Okay, we need to make sure your outgoing email settings are correct.</p>\n\n<ol>\n    <li>Go to the <strong>Tools</strong> menu and choose <strong>Email Accounts</strong></li>\n    <li>Select the button next to <i>View or change existing email accounts</i>and click <b>Next</b>, then select the account you want to change and click <strong>Change</strong>.</li>\n    <li>Fill in your name and email address, enter <b>volomail.net</b> as both the incoming and outgoing servers, and enter your username and password per the above</li>\n    <li>Click the <b>More Settings</b> button</li>\n    <li>Check the box next to <i>My outgoing server (SMTP) requires authentication</i> on the <b>Outgoing Server</b> tab.</li>\n    <li>Enter <b>587</b> in the box next to <i>Outgoing server (SMTP)</i> in the <b>Advanced</b> tab</li>\n    <li>Click <b>OK</b></li>\n    <li>Click <b>Next</b></li>\n    <li>Click <b>Finish</b></li>\n</ol>\n\n<p>Can you try sending an email now?</p>\n\n<p class=\"dont-say\">Wait for the caller to try it out...</p>\n\n<p>Did that fix the problem?</p>\n\n"
    ,buttons: {conclude: "Yes",problememailticket: "No"}
    ,buttonOrder: ['conclude','problememailticket']
};
screens['problememailsend_tb'] = {
    title: "Outgoing email for Outlook",
    body: "<p>Okay, we need to make sure your outgoing email settings are correct.</p>\n\n<ol>\n    <li>Go to the <strong>Tools</strong> menu, then select <strong>Account Settings</strong></li>\n    <li>Click on <strong>Outgoing Server (SMTP)</strong></li>\n    <li>Select the server in the box and click <strong>Edit</strong></li>\n    <li>The SMTP server should be <strong>volomail.net</strong></li>\n    <li>The port number should be <strong>587</strong></li>\n    <li>The box next to \"Use name and password\" under \"Security and Authentication\" should be checked.</li>\n</ol>\n\n<p>Can you try sending an email now?</p>\n\n<p class=\"dont-say\">Wait for the caller to try it out...</p>\n\n<p>Did that fix the problem?</p>\n\n"
    ,buttons: {conclude: "Yes",problememailticket: "No"}
    ,buttonOrder: ['conclude','problememailticket']
};
screens['problememailticket'] = {
    title: "File Ticket",
    body: "%MESSAGE\n\n<p>I can file a ticket for a technician to give you a call back and help troubleshoot the problem further.</p>\n"
    ,buttons: {conclude: "No thanks",robot: "File Ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','company?','username?','customer?','phone','email','onecomputer','problem','operator']]
    ,requiresSet: {firstname: 1,onecomputer: 1,lastname: 1,phone: 1,username: 1,operator: 1,email: 1,problem: 1,customer: 1,company: 1}
};
screens['problemgrandstream'] = {
    title: "Reset the Volo equipment",
    body: "<script type=\"text/javascript\">\n    $('dl.problemgrandstream dd').hide();\n    $('dl.problemgrandstream dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.problemgrandstream dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n\n<p>The grandstream is a small grey and black box. It should have 3 cables plugged into the back: power, phone, and internet. In the front there should be 4 green lights. From left to right those are: power, internet, link/act, and phone.</p>\n<p>All lights should be either solid or blinking green. Please let me know which if any are not lighting up.</p>\n\n\n<dl class=\"problemgrandstream\">\n<dt>Power is off/All are off</dt>\n<dd>\n<p>This indicates the device is not getting power. Can you confirm the connection on the power connector is solid and the plug goes into a working outlet?</p>\n</dd>\n<dt>Internet or Link/Act light is off</dt>\n<dd>\n<p>This indicates the device is not connected to the internet. Please confirm that the ethernet cable is snugly connected to both the grandstream and your router.</p>\n</dd>\n<dt>Phone light is off</dt>\n<dd>\n<p>This indicates the grandstream is not correctly communicating with our service. Unplug the power from the grandstream for 10 seconds and then plug it back in.</p>\n</dd>\n</dl>\n\n<p class='dont-say'>If these steps don't fix the problem click on file ticket and tell the customer a technician will need to look into the problem further.</p>\n"
    ,buttons: {conclude: "Service restored",problemwebticket: "File ticket "}
    ,buttonOrder: ['conclude','problemwebticket']
};
screens['problemnetwork'] = {
    title: "Network problem",
    body: "<p>Are you having trouble with web pages, email, or something else?</p>\n"
    ,buttons: {problemunknown: "Other problem",problemweb: "problemweb",problememail: "problememail"}
    ,buttonOrder: ['problemweb','problememail','problemunknown']
};
screens['problemnoip'] = {
    title: "Couldn't find account",
    body: "<p>I couldn't find your account based on the information you gave me. I can try again, or I can file a ticket for someone to look into the issue.</p>\n\n<p class=\"dont-say\">Please verify the last name, service address, and zip code before trying again.</p>\n\n"
    ,buttons: {problemwebticket: "File ticket",robot: "Run tests"}
    ,buttonOrder: ['robot','problemwebticket']
    ,requires: [['firstname','lastname','company?','username?','customer?','serviceaddress','aptunit','servicezip','hasrouter','onecomputer']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,onecomputer: 1,serviceaddress: 1,lastname: 1,username: 1,customer: 1,company: 1,hasrouter: 1}
};
screens['problemother'] = {
    title: "Other problem",
    body: "Please describe the problem, and we'll file a ticket to make sure someone gets back to you.\n"
    ,buttons: {robot: "Report problem"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','company?','email?','phone','ip?','serviceaddress','aptunit','servicezip','problem','urgency','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,operator: 1,email: 1,problem: 1,company: 1}
};
screens['problemphone'] = {
    title: "Problem with phone",
    body: "<p>Are you having trouble with calling out or receiving calls (or both)?</p>\n\n<p>Do you have a Polycom IP phone or Grandstream converter box?</p>\n"
    ,buttons: {robot: "Run tests"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','company?','customer?','callerphone','callout?','callin?','phonetype']]
    ,requiresSet: {callerphone: 1,firstname: 1,phonetype: 1,lastname: 1,callout: 1,customer: 1,callin: 1,company: 1}
};
screens['problemphone2'] = {
    title: "Problem with phone",
    body: "%MESSAGE\n\n<p>Are you having trouble with calling out or receiving calls (or both)?</p>\n\n<p>Do you have a Polycom IP phone or Grandstream converter box?</p>\n"
    ,buttons: {robot: "Run tests"}
    ,buttonOrder: ['robot']
    ,requires: [['callout?','callin?','voipreg?','phonetype']]
    ,requiresSet: {callout: 1,voipreg: 1,phonetype: 1,callin: 1}
};
screens['problempolycom'] = {
    title: "Reset the Volo equipment",
    body: "<script type=\"text/javascript\">\n    $('dl.problempolycom dd').hide();\n    $('dl.problempolycom dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.problempolycom dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n\n<p>Please tell me what the screen is displaying right now.</p>\n\n\n<dl class=\"problempolycom\">\n<dt>Nothing/Blank</dt>\n<dd>\n<p>This indicates the device is not getting power. Can you confirm the connection on the power connector is solid and the plug goes into a working outlet?</p>\n</dd>\n<dt>Waiting for network to initilize</dt>\n<dd>\n<p>This indicates the device has rebooted and is trying to connect to your network. This can take up to 2 min. If it has been longer than that, make sure the ethernet cable is connected from the LAN port on the back of the phone to your router. Sometimes it will look connected but be loose, please unplug and replug each end.</p>\n</dd>\n<dt>Network link is down</dt>\n<dd>\n<p>This indicates the cannot connect to your network. Make sure the ethernet cable is connected from the LAN port on the back of the pho    ne to your router. Sometimes it will look connected but be loose, please unplug and replug each end.</p>\n</dd>\n<dt>Running sip.ld</dt>\n<dd>\n<p>This indicates the phone is starting up. It can take a few minutes, please wait and it should start up.</p>\n</dd>\n</dl>\n\n<p class='dont-say'>If these steps don't fix the problem or the screen display is not listed click on file ticket and tell the customer a technician will need to look into the problem further.</p>\n"
    ,buttons: {conclude: "Service restored",problemwebticket: "File ticket "}
    ,buttonOrder: ['conclude','problemwebticket']
};
screens['problemretry'] = {
    title: "Couldn't find account",
    body: "%MESSAGE\n\n<p>Is this the name associated with the account, and is the\naddress you gave me the address of service?</p>\n\n<p class=\"dont-say\">Try to verify the name, address, and spelling.</p>\n"
    ,buttons: {problemother: "Report problem and call technician",robot: "Try again"}
    ,buttonOrder: ['robot','problemother']
    ,requires: [['firstname?','lastname','company?','serviceaddress','aptunit','servicezip'],['ip']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,company: 1}
};
screens['problemrouting'] = {
    title: "Forward to technician",
    body: "<p>The test shows a configuration problem. Please hold while I contact a technician.</p>\n\n<p class=\"dont-say\">Please send the following message to chat: \"There is a routing problem for customer <span class=\"username\">_</span>. Is anyone available to work on this.\" Wait 60 seconds and if there's no reply let the customer know you will file a ticket to have a technician work on the problem and click \"No one answered\".</p>\n\n<script type=\"text/javascript\">\n    if($('#v-username').val()) $('.username').html($('#v-username').val());\n    else $('p.username').hide();\n<"+"/script>\n\n"
    ,buttons: {conclude: "conclude",routingticket: "No one answered"}
    ,buttonOrder: ['routingticket','conclude']
};
screens['problemslowstart'] = {
    title: "Slow speed",
    body: "<p>I need some more information to diagnose speed problems.</p>\n\n<ul>\nWhich best describes your current setup:\n<li>Device plugged directly into the Volo connection</li>\n<li>Device plugged into router</li>\n<li>Device using WiFi on my own router</li>\n<li>Device using builtin WiFi at my building</li>\n</ul>\n\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['routerwifi','minimumspeed']]
    ,requiresSet: {minimumspeed: 1,routerwifi: 1}
};
screens['problemslowticket'] = {
    title: "File ticket regarding problem",
    body: "<p>I'm filing a ticket for a technician to look into the speeds. Slow speeds can be tricky to diagnose sometimes, but you should expect a call back on the next business day.</p>\n\n<p>After this I can schedule a technician visit for your location, but if the problem is with your equipment it will incur a service fee.</p>\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','company?','username?','customer?','phone','serviceaddress','aptunit','servicezip','hasrouter','onecomputer','problem','urgency','ip?','pingtime','speedtestdown','speedtestup','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,onecomputer: 1,ip: 1,pingtime: 1,lastname: 1,operator: 1,speedtestup: 1,problem: 1,company: 1,urgency: 1,serviceaddress: 1,phone: 1,username: 1,customer: 1,speedtestdown: 1,hasrouter: 1}
};
screens['problemstart'] = {
    title: "Customer problem",
    body: "Have you already reported the problem?\n"
    ,buttons: {problematic: "No",ticketcheck: "Yes"}
    ,buttonOrder: ['problematic','ticketcheck']
};
screens['problemtype'] = {
    title: "What kind of problem?",
    body: "What kind of problem are you experiencing?\n"
    ,buttons: {problem: "problem",problemother: "problemother"}
    ,buttonOrder: ['problem','problemother']
};
screens['problemunknown'] = {
    title: "Test for problem",
    body: "%MESSAGE\n\n<p>I can run some automatic tests to check if there's a problem with your Volo equipment. If that doesn't indicate a problem, you may need to contact a company that can provide support.</p>\n\n<p>Do you have a router?</p>\n\n<p>Is the problem affecting more than one computer?</p>\n"
    ,buttons: {problemcomputer: "Paid support",conclude: "No thanks",robot: "Run tests"}
    ,buttonOrder: ['robot','problemcomputer','conclude']
    ,requires: [['firstname','lastname','company?','username?','customer?','serviceaddress','aptunit','servicezip','hasrouter','onecomputer','problem']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,onecomputer: 1,serviceaddress: 1,lastname: 1,username: 1,problem: 1,customer: 1,company: 1,hasrouter: 1}
};
screens['problemweb'] = {
    title: "Problem with web pages",
    body: "<p>Let me take down some information, and we'll run some automatic tests.</p>\n\n<p>Is the problem the service is not working at all, it's running slowly, or do you see an Xfinity login screen?</p>\n\n<p>Do you have a router?</p>\n\n<p>Is the problem affecting more than one computer or device (phone, tablet, smart tv, etc)?</p>\n\n"
    ,buttons: {robot: "Run tests"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','company?','username?','customer?','ip?','serviceaddress','aptunit','servicezip','hasrouter','onecomputer','webproblemtype']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,onecomputer: 1,serviceaddress: 1,ip: 1,lastname: 1,username: 1,customer: 1,webproblemtype: 1,company: 1,hasrouter: 1}
};
screens['problemweb2'] = {
    title: "Tower has been reset",
    body: "<p>I reset the tower. Now I'm going to run the connection test again.</p>\n"
    ,buttons: {robot: "Run tests"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','company?','username?','customer?','ip?','serviceaddress','aptunit','servicezip','hasrouter','onecomputer']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,onecomputer: 1,serviceaddress: 1,ip: 1,lastname: 1,username: 1,customer: 1,company: 1,hasrouter: 1}
};
screens['problemweb_goodtest'] = {
    title: "Verified connection to premises",
    body: "<p>It looks like the connection from the Internet to your Volo equipment is working. Let's check the connection between the Volo equipment and your computer.</p>\n\n\n"
    ,buttons: {robot: "Run tests"}
    ,buttonOrder: ['robot']
};
screens['problemwebstart'] = {
    title: "Customer problem",
    body: "Let me check on that. Have you already reported the problem?\n"
    ,buttons: {ticketcheck: "Yes",robot: "No"}
    ,buttonOrder: ['robot','ticketcheck']
    ,requires: [['callerphone?','customer?']]
    ,requiresSet: {callerphone: 1,customer: 1}
};
screens['problemwebticket'] = {
    title: "File ticket regarding problem",
    body: "%MESSAGE\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','company?','username?','customer?','phone','serviceaddress','aptunit','servicezip','hasrouter','onecomputer','problem','urgency','ip?','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,onecomputer: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,username: 1,operator: 1,problem: 1,customer: 1,company: 1,hasrouter: 1}
};
screens['retrieve'] = {
    title: "Choose a location",
    body: "<p>Choose which location needs to be retrieved.</p>\n\n%NODES\n\n<script type=\"text/javascript\">\n    $('div.screen-retrieve dd').hide();\n    $('div.screen-retrieve dt').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-retrieve dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        $(this).parents('div.screen').find('div.input input').add('#v-node').val(\n            $(this).parents('dt').attr('node')\n        );\n        robot_check();\n        return(false);\n    });\n<"+"/script>\n\n<style type=\"text/css\">\n    div.screen-retrieve dl dt a\n    {\n        color: #027AC6;\n        padding: 0.3em;\n    }\n\n    div.screen-retrieve dl dt a:hover\n    {\n    text-decoration: underline;\n        cursor: pointer;\n    }\n</style>\n"
    ,buttons: {robot: "Retrieve this location"}
    ,buttonOrder: ['robot']
    ,requires: [['node','message']]
    ,requiresSet: {node: 1,message: 1}
};
screens['robot'] = {
    title: "Robot",
    body: "I am a robot.\n"
    ,buttons: {overage2: "overage2",ticketstatus: "ticketstatus",test: "test",overage1: "overage1",coveragesome: "coveragesome",conclude: "conclude",technician: "technician",coverageretry: "coverageretry",account: "account",upgraded: "upgraded",coveragegood: "coveragegood",notickets: "notickets",problemretry: "problemretry",coveragenone: "coveragenone",overage3: "overage3"}
    ,buttonOrder: ['account','conclude','coveragegood','coveragenone','coverageretry','coveragesome','notickets','overage1','overage2','overage3','problemretry','technician','test','ticketstatus','upgraded']
};
screens['roboterror'] = {
    title: "Error connecting to Volo",
    body: "<p class=\"dont-say\">The call script could not connect to the Volo server. Ask the customer to hold and call Thomas (217)840-0736.\nIf you can't reach him or he instructs you, click \"<a href=\"#\" class=\"foo\">go back</a>\" and try again or use a different path.</p>\n\n<script type=\"text/javascript\">$(function() { $('a.foo').click(function() { $('div.screen:last-child a.back').click(); return false; }) });<"+"/script>\n"
    ,buttons: {calltech: "calltech"}
    ,buttonOrder: ['calltech']
};
screens['root'] = {
    title: "",
    body: "<p>Volo Broadband this is _____, how can I help you?</p>\n\n<p class=\"dont-say\">Not everyone we serve has an account or customer number. Just continue and fill their information in manually</p>\n\n<p class=\"dont-say\">If the person says they just moved into an apartment and needs instructions or needs to set up an account, use \"Potential Customer\"</p>\n\n<p class=\"dont-say\">217-367-8656 is the Volo Office number. If that comes up as the caller ID, you have to ask the customer for their phone number and use that.</p>\n"
    ,buttons: {problemaccountstart: "Pay Bill / Billing / Account",potentialcustomerstart: "Potential Customer/New Customer Info",ticketcheck: "ticketcheck",problememail: "Email Problem",faqs: "FAQs",message: "Message / Other",problemwebstart: "Internet Problem/Outage Check",problemphone: "Phone Problem",calltech: "Forward to tech "}
    ,buttonOrder: ['potentialcustomerstart','problemwebstart','problemphone','problememail','problemaccountstart','ticketcheck','message','faqs','calltech']
    ,requires: [['callerphone?','customer?','operator']]
    ,requiresSet: {operator: 1,callerphone: 1,customer: 1}
};
screens['routerreset'] = {
    title: "Reset customer router",
    body: "<p>First, let's reboot you router: Unplug the power cable.  That's the small black cable in the back of the router with a round plug.  Wait 10 seconds, then plug it back in.</p>\n\n<p class=\"dontsay\">The customer may need to leave the phone to be able to reach their router, so it's best to tell them the instructions all at once.</p>\n\n<p>It will take 30 to 60 seconds for the router to reboot.  Let me put you on hold for one minute while we wait for it to reboot.</p>\n\n"
    ,buttons: {conclude: "Worked",bypassrouter: "Didn't work - Bypass Router"}
    ,buttonOrder: ['bypassrouter','conclude']
};
screens['routerresetspeedtest'] = {
    title: "Reset customer router",
    body: "<p>Sometimes to achieve full peformance routers need to be rebooted. Let's try that now.</p>\n\n<p>Unplug the power cable. That's the small black cable in the back of the router with a round plug. Wait 10 seconds, then plug it back in.</p>\n\n<p class=\"dontsay\">The customer may need to leave the phone to be able to reach their router, so it's best to tell them the instructions all at once.</p>\n\n<p>It will take 30 to 60 seconds for the router to reboot. Let me put you on hold for one minute while we wait for it to reboot.</p>\n\n"
    ,buttons: {speedtest: "Continue"}
    ,buttonOrder: ['speedtest']
};
screens['routerticket'] = {
    title: "File ticket regarding problem",
    body: "<p>Let me get all the information we need to bring you a router and then I can schedule it</p>\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','company?','username?','customer?','phone','serviceaddress','aptunit','servicezip','hasrouter','onecomputer','problem','urgency','ip?','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,onecomputer: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,username: 1,operator: 1,problem: 1,customer: 1,company: 1,hasrouter: 1}
};
screens['routingticket'] = {
    title: "File ticket regarding problem",
    body: "<p>There is a problem with our configuration, I'm going to file a ticket for a technician to update it which should resolve the problem.</p>\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','company?','username?','customer?','phone','serviceaddress','aptunit','servicezip','hasrouter','onecomputer','problem','urgency','ip?','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,onecomputer: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,username: 1,operator: 1,problem: 1,customer: 1,company: 1,hasrouter: 1}
};
screens['schedule'] = {
    title: "File ticket regarding problem",
    body: "%MESSAGE\n\nI can schedule a technician to come to your location. The earliest time we have available is %TECHTIME. When would you like the technician to come by?\n\n<p class=\"dont-say\">The system will give you the earliest time. If that doesn't work pick any time later than that between 9-5 Mon-Fri. If the customer requires a time outside that let them know you can't schedule that, and a manager will have to reach out to them for scheduling.</p>\n\n<p class=\"dont-say\"><strong>Make sure the customer understands that the technician is scheduled to arrive AT SOME POINT during the hour following the time above. The technician will also need time to fix the problem. The customer should expect to be home for at least 2 hours to account for arrival and repair time.</strong></p>\n"
    ,buttons: {conclude: "Conclude without scheduling",robot: "Schedule"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['hour','date','ticket']]
    ,requiresSet: {hour: 1,date: 1,ticket: 1}
};
screens['screenerror'] = {
    title: "Error in Volo script",
    body: "<p class=\"dont-say\">The call script got a bad reply from Volo, so\nwe can't move forward from here. You can click \"<a href=\"#\" class=\"foo\">go back</a>\" and try again.\nif that doesn't work, please reload the page and start the script over.\nFinally, call Thomas, Tony or Peter and let them know it's not working.\n</p>\n\n<script type=\"text/javascript\">$(function() { $('a.foo').click(function() { $('div.screen:last-child a.back').click(); return false; }) });<"+"/script>\n"
    ,buttons: {calltech: "calltech"}
    ,buttonOrder: ['calltech']
};
screens['services'] = {
    title: "Alter Services",
    body: "List of possible services with prices and the services purchased.  These can be found in the services section of the website.  This may require a new card number for each service that can be upgraded via the call center.  A small button filled in indicates that service is purchased on that account.   An open button indicate that it isn't purchased.  The CTC will make any changes and then submit them all at once.  Each service could have a mini explanation\n\n"
    ,buttons: {conclude: "conclude",robot: "robot"}
    ,buttonOrder: ['conclude','robot']
};
screens['signupcheck'] = {
    title: "Sign up check",
    body: "<p>Check to see if the internet is available to you now. Open an internet browser on your computer and try to visit google.com.</p>\n<p class='dont-say'>If the customer's service is not working, click problem still exists to file a ticket. Let them know a technician will give them a call by the next business day to do further troubleshooting. Otherwise click customer satisfied.</p>\n"
    ,buttons: {custendprobticket: "Problem still exists",conclude: "Customer Satisfied"}
    ,buttonOrder: ['custendprobticket','conclude']
};
screens['speedtest'] = {
    title: "Speedtest",
    body: "<p>Lets do a test to see what speed your service is running at right now.</p>\n<p>Please go to <strong>speedtest.net</strong> in your browser. Click \"go\" or \"begin test\", don't click on \"start\" that's an ad.</p>\n<p>You will get 3 numbers, ping, download, and upload. Please report them as the tests finish.</p>\n\n%MESSAGE\n"
    ,buttons: {conclude: "Good",problemslowticket: "Slow"}
    ,buttonOrder: ['conclude','problemslowticket']
    ,requires: [['pingtime','speedtestdown','speedtestup']]
    ,requiresSet: {speedtestup: 1,speedtestdown: 1,pingtime: 1}
};
screens['switchdown'] = {
    title: "File a ticket",
    body: "<p>The test showed that we have an unresponsive switch. Please hold while I contact a technician.</p>\n\n<p class=\"dont-say\">During business hours call these people in order to find out what to do: Thomas: 217-840-0736, Tony: 217-898-8669, Peter: 217-721-3893. Relay what they say to the customer and write it in the problem box.</p>\n\n<p class=\"dont-say\">After hours use this order: Tony, Peter, Thomas</p>\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname?','lastname','username?','customer?','serviceaddress','aptunit','servicezip','switchip','phone','problem?','urgency','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,switchip: 1,username: 1,operator: 1,problem: 1,customer: 1}
};
screens['ticketcheck'] = {
    title: "Check a ticket",
    body: "Can you tell me your ticket number?\n\n"
    ,buttons: {findtickets: "Don't know",robot: "Look up status"}
    ,buttonOrder: ['robot','findtickets']
    ,requires: [['ticket']]
    ,requiresSet: {ticket: 1}
};
screens['ticketcomment'] = {
    title: "Leave a comment",
    body: ""
    ,buttons: {conclude: "Abandon comment",robot: "Record comment"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['ticket','message','operator']]
    ,requiresSet: {operator: 1,ticket: 1,message: 1}
};
screens['ticketstatus'] = {
    title: "Ticket status",
    body: "<p>Here is the latest information on your ticket:</p>\n\n<h4>Title: %TICKETNAME</h4>\n\n%COMMENTS\n"
    ,buttons: {ticketcomment: "Comment",conclude: "Conclude",findtickets: "Find a different ticket",calltech: "Get Status",schedule: "Schedule Tech Visit"}
    ,buttonOrder: ['conclude','schedule','ticketcomment','calltech','findtickets']
};
screens['tnccaptivatedunit'] = {
    title: "Town and Country Captivated unit",
    body: "<p>Your unit has been captivated by our system.</p>\n\n<p>If you try to open a website on a phone, tablet, or computer you should be redirected to our portal and you can click to use the free service for another 2 weeks or sign up for the upgraded service. If this doesn't work you can browse to volo.net/tnc manually and do the same. If you don't have access to one of those devices, or the website doesn't open, I can uncapture your unit.</p>\n\n"
    ,buttons: {conclude: "Conclude",robot: "Uncaptivate"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','serviceaddress','aptunit','servicezip']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1}
};
screens['tnccheck'] = {
    title: "Confirm as Town and Country resident",
    body: "Are you a resident of Town and Country?\n"
    ,buttons: {tncsignup: "Yes",voloinfo: "No"}
    ,buttonOrder: ['tncsignup','voloinfo']
};
screens['tncproblem'] = {
    title: "Problem at Town and Country",
    body: "<p>Let me take down some information, and we'll run some automatic tests and reset the switch you're connected to.</p>\n\n<script type=\"text/javascript\">\n    $(function() {\n        $('#v-ticket').val('');\n    });\n<"+"/script>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['customer'],['username'],['serviceaddress']]
    ,requiresSet: {serviceaddress: 1,customer: 1,username: 1}
};
screens['tncsignup'] = {
    title: "Town and Country",
    body: "<p>Volo has partnered with Town and Country to offer internet service to all residents. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is incompatible with modems and modem/router combo devices.  If you want to add multiple computers or wifi you will want to install a router that is not a router/modem combo, which you can buy at Walmart, Best Buy, Amazon, or other places.</p>\n\n<p>The provided service is 3mbps, you may also upgrade to 100Mbps for 29.95 per month. Please call the Town and Country office at (217) 866-1755 to if you would like to upgrade to the 100Mpbs service, or navigate to volo.net/tnc.</p>\n"
    ,buttons: {conclude: "Conclude "}
    ,buttonOrder: ['conclude']
};
screens['towerdownticket'] = {
    title: "File ticket regarding problem",
    body: "%MESSAGE\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname','lastname','company?','username?','customer?','phone','serviceaddress','aptunit','servicezip','ip','problem','urgency','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,username: 1,operator: 1,problem: 1,customer: 1,company: 1}
};
screens['towerreset'] = {
    title: "Tower Reset",
    body: "<p>The test shows that the tower in your area might be down. I'm going to reset it, and we'll see if you have a connection after that. It will take about a minute for the reset to finish.</p>\n"
    ,buttons: {robot: "Reset Tower"}
    ,buttonOrder: ['robot']
    ,requires: [['ip']]
    ,requiresSet: {ip: 1}
};
screens['towerstatus'] = {
    title: "File a ticket",
    body: "%MESSAGE\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname?','lastname','username?','customer?','serviceaddress','aptunit','servicezip','phone','problem?','urgency']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,username: 1,problem: 1,customer: 1}
};
screens['towertest'] = {
    title: "Tower Test",
    body: "%MESSAGE\n"
    ,buttons: {robot: "Run Tests"}
    ,buttonOrder: ['robot']
    ,requires: [['ip']]
    ,requiresSet: {ip: 1}
};
screens['towertest2'] = {
    title: "Tower Re-Test",
    body: "<p>I've reset the tower, now I'm going to run another test to see if it's working correctly.</p>\n"
    ,buttons: {robot: "Run Tests"}
    ,buttonOrder: ['robot']
    ,requires: [['ip']]
    ,requiresSet: {ip: 1}
};
screens['ucomminfo'] = {
    title: "Midtown Lofts",
    body: "<p>Midtown Lofts is providing Volo's gigabit fiber internet to your unit as an included amenity. The provided service provides speeds up to 1 gigabit (1000mbps), just about the fastest service in the country. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is proved directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port and start enjoying it!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['unknownprobticket'] = {
    title: "File a ticket",
    body: ""
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname?','lastname','company?','serviceaddress','aptunit','servicezip','phone','problem?','ip?','operator']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,operator: 1,problem: 1,company: 1}
};
screens['upgraded'] = {
    title: "Service upgraded",
    body: "<p>Your upgrade has been confirmed. It will show up on your next bill and\nis effective immediately.</p>\n\n<p>Your new bandwidth limit is %LIMIT megabytes per day.</p>\n\n"
    ,buttons: {conclude: "conclude"}
    ,buttonOrder: ['conclude']
};
screens['usagecalc'] = {
    title: "Usage Calc",
    body: "<script>\n    function calculate() {\n        var video = parseInt($('#fiber-video').val(), 10);\n        var games = parseInt($('#fiber-games').val(), 10);\n        var other = parseInt($('#fiber-other').val(), 10);\n\n        var bandwidth = parseFloat((video * 2) + (games * 1) + (other * 1));\n        if (bandwidth < 9) {\n            $('#fiber-output').text(\"Light Fiber service at $29.95 per month\");\n        } else if (bandwidth < 29) {\n            $('#fiber-output').text(\"Medium Fiber service at $49.95 per month\");\n        } else {\n            $('#fiber-output').text(\"Heavy Fiber service at $59.95 per month\");\n        }\n    }\n    $('div.fiberfaq input.fiber-calc').change(calculate()); \n<"+"/script>\n\n<form>\n<p>If you can answer 3 quick questions for me, I can recommend the best tier to match your needs.</p>\n<label for=\"fiber-video\">How many hours of streaming video would you like to watch in a day, if any?</label>\n<input type=\"number\" class=\"fiber-calc\" id=\"fiber-video\" onkeyup=calculate() value=0>\n<br />\n<label for=\"fiber-games\">How many hours of gaming would you like to do in one day, if any?</label>\n<input type=\"number\" class=\"fiber-calc\" id=\"fiber-games\" onkeyup=calculate() value=0>\n<br />\n<label for=\"fiber-peer\">How much peer to peer or other high bandwidth activities do you do in gigabytes per day, if any?</label>\n<input type=\"number\" class=\"fiber-calc\" id=\"fiber-other\" onkeyup=calculate() value=0>\n<br />\n<p>We recommend: <span style=\"font-weight: bold;\" id=\"fiber-output\"></span> based on you usage level.</p>\n</form>\n\n"
};
screens['volodown'] = {
    title: "Volo connection down",
    body: "<p>%MESSAGE</p>\n\n<p>Do you have access to the power plug for the Volo equipment?  That will normally be inside, near your computer or router.</p>\n"
    ,buttons: {problemwebticket: "Already Reset",nopoeprobticket: "No",findpoe: "Yes"}
    ,buttonOrder: ['findpoe','nopoeprobticket','problemwebticket']
};
screens['voloequipmentticket'] = {
    title: "File a ticket",
    body: "<p>There is still no connection from the tower to your location. I'm going to file a ticket now and we'll have a technician get to work on the problem.</p>\n"
    ,buttons: {conclude: "Abandon ticket",robot: "File ticket"}
    ,buttonOrder: ['robot','conclude']
    ,requires: [['firstname?','lastname','company?','username?','customer?','serviceaddress','aptunit','servicezip','phone','problem?','urgency','ip?','operator']]
    ,requiresSet: {firstname: 1,urgency: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,username: 1,operator: 1,problem: 1,customer: 1,company: 1}
};
screens['volofaq'] = {
    title: "Volo FAQ",
    body: "<script type=\"text/javascript\">\n    $('div.screen-faqs dd.menu').hide();\n    $('div.screen-faqs dt.menu').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-faqs dt.menu a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n\n<dl>\n<dt class=\"menu\" category='fiber'>What are Volo's Fiber Services?</dt>\n<dd class=\"menu\">[screen:fiberfaq]</dd>\n<dt class=\"menu\" category='wireless'>What are Volo's Wireless Services?</dt>\n<dd class=\"menu\">[screen:wirelessfaq]</dd>\n</dl>\n"
};
screens['voloinfo'] = {
    title: "About Volo",
    body: "<script type=\"text/javascript\">\n    $('div.screen-voloinfo dd').hide();\n    $('div.screen-voloinfo dt').wrapInner('<a href=\"#\"></a>');\n    $('div.screen-voloinfo dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n\n[screen:volospiel]\n\n[screen:volofaq]\n\n<p><strong>Are you interested in getting Volo Broadband?</strong></p>\n\n"
    ,buttons: {conclude: "No",potentialinstall: "Yes"}
    ,buttonOrder: ['potentialinstall','conclude']
};
screens['voloinfo_nogeo'] = {
    title: "About Volo",
    body: "[screen:volospiel]\n\n[screen:volofaq]\n\n<p><strong>If you're interested, I'll first need to take down some\ninformation so we can schedule a coverage survey for your site.</strong></p>\n"
    ,buttons: {conclude: "No thanks",schedulesurvey: "Schedule survey"}
    ,buttonOrder: ['schedulesurvey','conclude']
};
screens['voloinfo_nosched'] = {
    title: "About Volo",
    body: "[screen:volospiel]\n\n[screen:volofaq]\n\n"
    ,buttons: {conclude: "conclude",checkcoverage: "checkcoverage"}
    ,buttonOrder: ['checkcoverage','conclude']
};
screens['voloreset'] = {
    title: "Reset the Volo equipment",
    body: "<script type=\"text/javascript\">\n    $('dl.voloreset dd').hide();\n    $('dl.voloreset dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.voloreset dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n<p>The box should will have a black cord coming out of it, going to a power outlet. Unplug that cord for 10 seconds, and tell me when you've plugged it back in.</p>\n\n<dl class=\"voloreset\">\n<dt>Show image</dt>\n<dd><img src=\"images/poe.png\"></dd>\n</dl>\n\n<p class=\"dont-say\">Once they've plugged it back in click \"Test connection\". This test automatically waits 40 seconds before testing.</p>\n"
    ,buttons: {robot: "Test connection"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname?','lastname','phone','company?','serviceaddress','aptunit','servicezip'],['phone','ip']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,ip: 1,lastname: 1,phone: 1,company: 1}
};
screens['volospiel'] = {
    title: "Volo Spiel",
    body: "<p>Volo Broadband is a high-speed internet service provider serving homes and businesses in Champaign County using fiber and wireless technology.</p>\n<p>Volo's wireless internet prices start at &#36;39.95 per month. Speeds range from 2 to 20 megabits per second. Exact installation and service availability and cost vary on location. Volo is also able to build custom connections for large commercial entities.</p>\n<p>Volo's fiber internet prices start at &#36;29.95 and speeds are up to 1000Mbps (or 1Gbps).</p>\n"
};
screens['voloworking'] = {
    title: "Volo connection working",
    body: "%MESSAGE\n\n<p>Let's try to restore your connection now by resetting or rebooting your equipment.</p>\n\n<p>Do you use a router?</p>\n"
    ,buttons: {routerreset: "Reboot customer router",custreboot: "Customer doesn't have a router"}
    ,buttonOrder: ['custreboot','routerreset']
};
screens['waholdingsinfo'] = {
    title: "WA Holdings",
    body: "<p>WA Holdings is providing Volo's gigabit fiber internet to your unit as an included amenity. The provided service provides speeds up to 1 gigabit (1000mbps), just about the fastest service in the country. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. Do not use a modem, our service is proved directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>This is an included ammenity, you do not have to pay for it. Just connect to the ethernet port and start enjoying it!</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['wamplerinfo'] = {
    title: "Wampler Apartments",
    body: "<p>Wampler Apartments is providing Volo's fiber internet to your unit as an included amenity. The provided service provides speeds up to 1 gigabit (1000mbps), just about the fastest service in the country. You can start using it immediately by connecting your computer or router to the ethernet port in your apartment. <b>Do not use a modem or modem/router combo device</b>, our service is provided directly through ethernet ports in the wall. You are a free to use a router, just connect the internet, WAN, or modem port to the wall port. You can also connect a computer directly.</p>\n\n<p>The internet at Wampler is very fast, so to take full advantage of the service you will need to get a router that is capable of 1000 megabits on all its ports, and supports 802.11AC wi-fi.</p>\n\n<p>Your service should be active now, you don't need to sign up.  If you pay anything for the service, you'd pay that directly to Wampler Apartments along with your rent.</p>\n"
    ,buttons: {conclude: "Conclude",problemweb: "I need help"}
    ,buttonOrder: ['conclude','problemweb']
};
screens['winfieldcheck'] = {
    title: "Confirm as Winfield Village resident",
    body: "Are you a resident of Winfield Village?\n"
    ,buttons: {winfieldsignup: "Yes",voloinfo: "No"}
    ,buttonOrder: ['winfieldsignup','voloinfo']
};
screens['winfieldinfo'] = {
    title: "Volo at Winfield Village",
    body: "<p>Residents at Winfield Village don't pay an installation cost. There are\nthree Volo service options for residents at Winfield Village.</p>\n\n<p>Light users generally choose <b>Priority 250</b> for <b>$20</b>/month.\nRegular users choose <b>Priority 500</b> for <b>$25</b>/month because this\nservice allows for twice the download capability. Both Priority 250 and\nPriority 500 have speeds up to 30 megabits per second.</p>\n\n<p>The third option is <b>Bulk Broadband</b>. Select users choose this\nservice because it allows for unlimited downloading, but reduces speed to\none megabit per second.</p>\n\n<p><b>Would you like to schedule an installation?</b></p>\n\n"
    ,buttons: {conclude: "No thanks",schedule: "schedule"}
    ,buttonOrder: ['schedule','conclude']
};
screens['winfieldplan'] = {
    title: "Change Plan",
    body: "\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['winfieldplan','serviceaddress']]
    ,requiresSet: {serviceaddress: 1,winfieldplan: 1}
};
screens['winfieldproblem'] = {
    title: "Reset Switch",
    body: "I'm going to reset the switch you're connected to, and then we'll see if you can connect.\n\n<script type=\"text/javascript\">\n    $(function() {\n        $('#v-ticket').val('');\n    });\n<"+"/script>\n"
    ,buttons: {robot: "Continue"}
    ,buttonOrder: ['robot']
    ,requires: [['customer'],['username'],['serviceaddress']]
    ,requiresSet: {serviceaddress: 1,customer: 1,username: 1}
};
screens['winfieldsignup'] = {
    title: "Winfield Sign Up",
    body: "%MESSAGE\n"
    ,buttons: {robot: "Sign Up"}
    ,buttonOrder: ['robot']
    ,requires: [['firstname','lastname','email?','phone?','serviceaddress','aptunit','servicezip','winfieldplan']]
    ,requiresSet: {firstname: 1,servicezip: 1,aptunit: 1,serviceaddress: 1,lastname: 1,phone: 1,email: 1,winfieldplan: 1}
};
screens['wirelessfaq'] = {
    title: "",
    body: "<script type=\"text/javascript\">\n    $('dl.wirelessfaq dd').hide();\n    $('dl.wirelessfaq dt').wrapInner('<a href=\"#\"></a>');\n    $('dl.wirelessfaq dt a').click(function() {\n        var $dd=$(this).parents('dt').next();\n        if($dd.hasClass('open')) $dd.hide('fast');\n        else $dd.show('fast');\n        $dd.toggleClass('open');\n        return(false);\n    });\n<"+"/script>\n\n<p>Our Wireless service connects you to the Internet through a receiver we install on the roof of your building: Volo has two wireless Internet service choices available.</p>\n\n<p>You still need a router to use WiFi, it's called wireless because that's how it's delievered to the location.</p>\n\n<p>Our basic service starts at &#36;39.95 per month, and our streaming service costs &#36;75 per month.</p>\n\n<p><strong>Basic Broadband</strong> is ideal for someone looking for basic high-speed Internet service.  This service works like the cell phone service where you have a limit each day, except if you exceed your limit your service slows down instead of incurring additional charges. It includes 250 Mega Bytes per day of Priority Bandwidth delivered over the trademark Volo connection. Basic Broadband includes, in our experience, ample bandwidth to browse the Internet and check your email. Other usage (particularly, streaming video like Netflix) can use that bandwidth up quickly.</p>\n<p><strong>Streaming</strong> service is designed for users who enjoy watching Youtbe, Netflix, Hulu, other video streaming sites, or listening to online radio for more than four hours per day. This service is not available in all locations. Streaming service doesn't permit peer-to-peer file sharing and do contain a data cap to prevent runaway processes like virus infections, but that cap will be tailored to your needs and even by default is ample for most streaming media uses (about 10GB/day).\n\n<dl class=\"wirelessfaq\">\n<dt question='1'>How much does Volo Wireless cost?</dt><!--{{{-->\n<dd>\n<p>The basic rate is &#36;39.95/month. That covers 250 MB/day of usage. You can add additional bandwith in increments of 250/day at &#36;10/month.</p>\n<p>The streaming price is &#36;$75 per month.</p>\n<p>There is also an installation fee of &#36;200-&#36;300 depending on location. The installation fee can be paid over the first 3 months of service.</p>\n<p>If you sign up for a qualilfying DirectTV or Dish Network service through us, we will reduce the installation by &#36;150.</p>\n</dd><!--}}}-->\n<dt question='2'>What's the difference between megabits and megabytes?</dt><!--{{{-->\n<dd>\n<p>One megabyte is equal to eight megabits, but the terms are used in specific ways: Megai<strong>bits</strong> per second (mbps) are generally used to describe the <strong>speed</strong> of an Internet connection, whereas mega<strong>bytes</strong> (MB) usually refer to the <strong>size</strong> of a file or storage space.</p>\n<p>In practical terms, one megabit per second is slow but usable broadband Internet. Five to ten web pages, one minute of music, or a half a minute of video is about one megabyte of data.</p>\n</dd><!--}}}-->\n<dt question='3'>How the Service works</dt><!--{{{-->\n<dd>\n<p>Our Wireless service connects you to the Internet through a receiver we install on the roof of your building: The receiver hooks into our wireless network in town. We run a cable from that receiver to an appropriate place on the outside of your house, near where your computer or network hub is located. The cable enters your house there, and plugs into a small black box that provides electrical power for the receiver.</p>\n</dd><!--}}}-->\n<dt question='4'>Coverage - Do you serve [location]?</dt><!--{{{-->\n<dd>\n<p>We provide service to most locations within about 7 miles of downtown Champaign. If you'd like, I can have a technician call you back shortly to discuss details of our coverage in your area.</p>\n<p>We do not cover Mahomet, St Joe, Tolono Pesotum, Rantoul, Monticello or White Heath.</p>\n</dd><!--}}}-->\n<dt question='5'>Do I own the equipment?</dt><!--{{{-->\n<dd>\n<p>For security reasons, we can't sell the equipment to you. Even if we could, it wouldn't do you much good. The equipment is designed to work with our system, and wouldn't be much use without it.</p>\n</dd><!--}}}-->\n<dt question='6'>What does the Volo receiver look like / How big is your antenna?</dt><!--{{{-->\n<dd>\n<p>Customers in strong coverage areas use a receiver that's 12 inches square, either white or a medium gray.</p>\n<p>Some customers require a larger antenna, a 36-inch wide wire grid. Usually the larger antenna would be in addition to the smaller one.</p>\n</dd><!--}}}-->\n<dt question='7'>What do I get for my Installation?</dt><!--{{{-->\n<dd>\n<p>Your installation cost pays for a professional installation of the receiver, running cabling, mounting hardware, and setting up your computer or router. It also covers maintenance of the Volo equipment at your location for as long as you are a customer.</p>\n</dd><!--}}}-->\n<dt question='8'>If I move, do I pay for installation again?</dt><!--{{{-->\n<dd>\n<p>If you move to an area that Volo serves, we will transfer your service to your new location for a nominal fee.</p>\n</dd><!--}}}-->\n<dt question='9'>Speed: Volo vs Cable/DSL/Dialup</dt><!--{{{-->\n<dd>\n<p>Volo Wireless speeds vary based on location. Customers can see download speeds up to 20 megabits per second, and upload speeds up to 12 megabits per second. Typical speeds are 2-5 megabits per seconds down and 1-2 megabits per second up.</p>\n</dd><!--}}}-->\n<dt question='10'>I have Unlimited Service, how can I go over a bandwidth allocation?</dt><!--{{{-->\n<dd>\n<p>On our unlimited streaming connections we still set a technical bandwidth limit. This is intended to catch problems such as viruses on our customer's computers. Sudden increases in bandwidth usage are often a sign that a computer has been comprimised.</p>\n<p>If you are hitting the limit with regular usage, we will raise the technical limit to a level where it does not interfere with your enjoyment of the internet.</p>\n</dd><!--}}}-->\n</dl>\n<!--\nvi:foldmethod=marker:\n-->\n"
    ,buttons: {conclude: "conclude"}
    ,buttonOrder: ['conclude']
};
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
var debug=false || Boolean(document.location.search.match(/debug/));
var test=false  || Boolean(document.location.search.match(/test/));
var ALWAYS_SHOW_INPUTS=true; // Always, or only when not yet filled out?

$(function() { //{{{1
  $("#restart-call").click(function() {
    $("#i div.panel-content").empty();
    $("#o div.element input").add("#o div.element textarea")
      .not('#v-call-id, #v-calltime, #v-ticket').val('');
    show_screen('root');
    return(false);
  });
  
  $("#new-call").click(function() {
    $("#i div.panel-content").empty();
    $("#o div.element input").add("#o div.element textarea").val('');
    var $operator = $('#operator').val();
    window.location.reload();
    $('#v-operator').val($operator);
    return(false);
  });
  
  $.ajaxSetup({
    url: 'https://volo.net/secure/cs/vbot'+(test?'_test':'')+'.cgi',
    type: 'GET',
    dataType: 'json',
    error: function(request, status, error) {
      if(debug) console.log(error);
      if(debug) console.log('AJAX error: %o', this);
      var last_screen = $("#i div.screen:last-child").attr("sid");
      show_screen('roboterror');
      if(!test) {
        $.ajax({
          url: 'https://volo.net/secure/cs/v.cgi',
          data: { q: "project add ticket 4 'Error during call "+$('#v-call-id').val()+" ["+last_screen+"]' 15801 'https://volo.net/secure/cs/v.cgi?report+csr+call+"+$('#v-call-id').val()+"\nscreen: "+last_screen+"'" },
          error: function() { },
          type: 'GET'
        });
      }
    }
  });
  
  $("#v-calltime").val(new Date().format('H:i'));
  
  $.ajax({ data: { screen: 'root', debug: debug, timestamp: new Date().getTime() },
    success: function(response) {
      $('#v-call-id').val(response['v-call-id']);
    }
  });
  
  // Behaviors {{{2
  $('body').on('click', 'input.copy-caller-id', function() {
      $(this).parents('div.input').find('input.phone')
          .val($('#v-callerphone').val());
      $('#v-phone').val($('#v-callerphone').val());
      robot_check();
  });
  
  $('body').on('click', 'input.not-an-apartment', function() {
      $(this).parents('div.input').find('input.aptunit')
          .val("n/a");
      $('#v-aptunit').val("n/a");
      robot_check();
  });
  
  // SJB 2011.10.18
  $('body').on('click', 'input.fetch-addr', function() {
  	$(this).parents('div.input').find('input.phone').val($('#v-calleraddress').val());
  	$('#v-address').val($('#v-calleraddress').val());
  	robot_check();
  });

  $('body').on('click', 'div.screen a.back', function() {
    var $to=$(this).parents("div.screen");
    if(!$to.hasClass('screen-old')) $to=$to.prev();
    $to.nextAll().remove();
    // XXX would it be better to remove $me and re-show_screen?
    $to.removeClass('screen-old');
    $to.find('input, textarea, select').prop('disabled', false).removeClass('selected');
    return(false);
  });
  //}}}
  
  show_screen('root');
  $('#i div.screen:first-child').addClass('first-screen');
  
  if(debug) { //{{{2
      $('#r-call-id').add('#f-other-info').add('#f-account-info').show();
      $("#o div.panel-content").append('<input type="button" value="&laquo; Copy" id="copy"/>');
      $("#copy").click(function() {
          $("#i div.screen:last-child input").each(function() {
              if(debug) console.log($(this).attr('id')+": "+$(this.val()));
              $(this).val($("#v-"+$(this).attr('id')).val());
          });
          robot_check();
      });

      // Button to auto-fill caller info
      $("#o div.panel-content").append('<input type="button" value="Fill" id="fill"/>');
      $("#fill").click(function() {
          $("#v-calltime").val(new Date().format('H:i'));
          $("#v-firstname").val("Steve");
          $("#v-lastname").val("Severinghaus");
          $("#v-serviceaddress").val("312 W. Springfield Ave. #200");
          $("#v-servicezip").val("61801");
          $("#v-phone").val("217-367-8656");

          $("#v-account").val("314159");
          $("#v-password").val("password");

          $("#v-ip").val("64.198.215.72");
          $("#v-company").val("ACME Widgets");

          $("#v-forwhom").val("Peter");
          $("#v-message").val("Test message from the call center script.");
      });

      $("#o div.panel-content").append('<input type="button" value="Clear" id="clear"/>');
      $("#clear").click(function() {
          $("#o div.element input").add("#o div.element textarea").val('');
      });

      $("#o div.panel-content").append('<input type="button" value="Reload screens" id="rescreen"/>');
      $("#rescreen").click(function() {
          $.getScript("https://volo.net/secure/c2/screens.js");
      });

      // Button to jump to a specific screen
      $("#i h3").prepend('<input type="button" value="goto" id="goto"/>');
      $("#goto").attr('style', 'float: right;');
      $("#goto").click(function() {
          var id=prompt("Go to screen:", "robot");
          if(id) show_screen(id);
      });

      if(self.document.location.hash) {
          show_screen(unescape(self.document.location.hash.substring(1)));
      }
  } //}}}
  else {
      $("#o div.element input").add("#o div.element textarea").attr('disabled', true);
  }
}); //}}}

function show_screen(id, params, $s) { //{{{1
  var screen = screens[id];

  if(!screen) {
    show_screen('screenerror');
    $.ajax({ data: { screen: id } });
    return;
  }
  
  if(!$s)
  {
    // Disable past screens
    $("#i div.screen").addClass('screen-old');
    $("#i div.screen-old input, #i div.screen-old textarea, #i div.screen-old select").attr('disabled', true);
    
    // Add a new screen
    $("#i div.panel-content").append('<div class="screen">');
    var $s=$("#i div.screen:last-child").attr('sid', id).addClass('screen-'+id);
    if (screen.title)
        $s.append('<div class="screen-title">'+screen.title);
    if(debug && screen.title)
        $s.find('div.screen-title').attr('title', id);
  }
  
  if(debug) console.log("[show_screen] screen: "+screen);
  var body=parameterize(screen.body, params); // Fill out parameters returned by robot
  
  // Include referenced screens
  var fregex=new RegExp(/\[screen:([a-z0-9]+)\]/);
  var fmatch;
  while(fmatch=fregex.exec(body)) {
    if(debug) console.log("[show_screen] "+fregex[1]);
    body=body.replace(fregex, parameterize(screens[fmatch[1]].body, params));
  }
  
  $s.append('<div class="screen-body">'+body);
  
  // Have input requirements already been satisfied?
  var satisfied=true;
  for(var i=0;screen.requires && i<screen.requires.length;i++) {
    var ds=true;
    for(var j=0;j<screen.requires[i].length;j++) {
      var field=screen.requires[i][j];
      if(!field.match(/\?$/) && !$("#v-"+field).val()) {
        ds=false;
        break;
      }
    }
    satisfied=ds;
    if(satisfied) break;
  }
  
  // Attach appropriate inputs if necessary
  for(var i=0;(ALWAYS_SHOW_INPUTS||!satisfied) && screen.requires && i<screen.requires.length;i++) {
    $s.append('<div class="input-set">');
    var $in=$s.find('div.input-set:last-child');
    for(var j=0;j<screen.requires[i].length;j++) {
      var field=screen.requires[i][j];
      var optional=field.match(/\?$/);
      field=field.replace(/\?$/, '');
      if(ALWAYS_SHOW_INPUTS||!$("#v-"+field).val()) {
        $in.append($("#inputs div.input-"+field).clone());
        $in.find("div.element:last-child").addClass(optional?'optional':'required');
        $in.find("div.element:last-child div.input > #"+field).val($("#v-"+field).val());
        //checkbox 
        $in.find("div.element:last-child div.input > #"+field).prop('checked', $("#v-"+field).val()?true:false);
      }
    }
    if(i!=screen.requires.length-1) {
        $s.append('<div class="input-set-separator">&mdash; or &mdash;</div>');
    }
  }
  
  if($('#v-callerphone').val()) {
    $s.find('input.phone').not('#callerphone').parents('div.input')
      .append('<input type="button" class="copy-caller-id" value="Copy Caller ID"/>');
  }
  $s.find('input.phone').not('#callerphone').parents('div.input')
    .append('<input type="button" class="copy-fetch-addr" value="Fetch Caller Info"/>'); //SJB
  
  if($('#v-username').val() && $s.find('input[name=serviceaddress]').length) {
    $.ajax({
      url: 'autocomplete/sites?q='+$('#v-username').val(),
      dataType: 'json',
      success: function(data) {
        var addresses = Array();
        for(var i in data) {
          addresses.push(data[i][0]);
        }
        $s.find('input[name=serviceaddress]').autocomplete(addresses);
      },
      error: function(request, status, error) {
        if(debug) console.log(error);
        if(debug) console.log('AJAX error: %o', this);
      },
    });
  }
  
  // Attach validation behavior to inputs
  behave($s);

  $s.append('<div class="buttons">');
  var $buttons=$s.find('div.buttons');
  for(var i=0;screen.buttonOrder && i<screen.buttonOrder.length;i++)
  {
    var tid=screen.buttonOrder[i];
    var target = screens[tid];
    var title = screen.buttons[tid];
    if(tid == title && target && target.title) title = target.title;
    
    add_button(id, $buttons, tid, title, screen.requires);
  }

  // Perform validation based on info we can pre-populate
  robot_check($s);
  
  $s.append('<a class="back" href="#">Go back</a>');
  
  // Scroll the left panel down to the very bottom
  $("#i div.panel-content").each(function() { this.scrollTop = this.scrollHeight; });
} //}}}

function parameterize(body, params) { //{{{1
    // Fill out parameters returned by robot
    for(var param in params) {
      if(param.match(/^v-/)) {
        if(debug) console.log("[parameterize]#"+param+": "+params[param]);
        $("#"+param).val(params[param]);
      }
      else if (param == 'servicelevels') {
        $('#aptservice').html('<option selected>Choose Service Level</option>');
        for (var $i in params[param]) {
          if(debug) console.log("[parameterize]# "+params[param][$i][0]+": "+params[param][$i][2]);
          $('#aptservice').append('<option value="'+params[param][$i][0]+'">'+params[param][$i][2]+'</option>');
          //for (var $j in params[param][$i]) {
          //  if(debug) console.log("[parameterize]# "+params[param][$i][0]+"-"+$j+": "+params[param][$i][$j]);
          //}
        }
      }
      else {
        body = body.replace(new RegExp("%"+param), '<span class="param">'+params[param]+'</span>')
      }
    }
    body = body.replace(/%[A-Z]+/g, ''); // Remove optional parameters
    return(body);
} //}}}

function behave($s) { //{{{1
  if(!$s) $s=$("#i div.screen:last-child");

  // Perform validation of inputs and requirement checking for robot button.
  $s.find("div.input-set input, div.input-set textarea, div.input-set select").each(function() {
    $(this).change(function() {
      robot_check($(this).parents("div.screen"));
      // Copy valid value to info panel
      if(!$(this).hasClass('invalid')) {
        $("#r-"+$(this).attr('name')+" div.value :first-child").val($(this).val());
      }
      if($(this).attr('type') == 'checkbox') {
        if ($(this).is(":checked") || $(this).prop("checked")) {
          $("#r-"+$(this).attr('name')+" div.value :first-child").val($(this).attr('name'));
        }
      }
    });
    $(this).keypress(function() {
      // We don't have the proper value (including the key just
      // pressed) yet, so wait a bit and then do your thing.
      setTimeout('robot_check()', 10);
    });
    if ($(this).attr('name') == 'serviceaddress') {
      initAutocompleteAddress(this,$(this).closest('div.input-set').find('#servicezip')[0]);
    }
    if ($(this).attr('name') == 'unit') {
      var theUnit = this;
      $(this).next().click(function (){
        theUnit.value = 'n/a';
        $(theUnit).trigger('change');
      });
    }
  });
} //}}}

function robot_check($s) { //{{{1
  if(!$s) $s=$("#i div.screen:last-child");
  
  $s.find('div.input-set input, div.input-set textarea, div.input-set select').validate();
  
  var $b=$s.find("input.b-robot");
  if($s.find('div.input-set').length && ($b.length || $s.find('input.b-root'))&& !$s.find(".invalid").length) {
    var good_set=false;
    $s.find("div.input-set").each(function() {
      var requirements_met=true;
      $(this).find("div.required input, div.required textarea, div.required select").each(function() {
        if(!$(this).val()) requirements_met=false;
      });
      
      if(requirements_met) {
        $s.find("input.b-root").prop('disabled', false);
        $s.find("input.b-robot").prop('disabled', false);
        good_set=true;
        return;
      }
    });
    if(!good_set) {
      $b.val($b.attr('roboval')+' (fill out form)').prop('disabled', true);
      $s.find("input.b-root").prop('disabled', true);
    }
  }
} //}}}

function add_button(sid, $s, tid, title, requires) { //{{{1
  $s.append('<input type="button" value="'+title+'" class="b-'+tid+'"/>');
  var $b=$s.find("input:last-child").attr('tid', tid);
  
  if(tid == "robot") {
    $b.val(title == 'Robot' ? 'Submit' : title).attr('roboval', $b.val());
    $b.click(function() {
      $(this).addClass('selected');
      var data=build_data(sid);
      $('div.screen:last-child input.b-robot').val("Waiting...").prop('disabled', true);
      $.ajax({ data: data,
        success: function(response) {
          if(response.screen && screens[response.screen])
            show_screen(response.screen, response);
          else {
            show_screen(data.screen='screenerror');
            $.ajax({ data: data });
          }
        },
        complete: function(data, status) {
          $(this).val($(this).attr('roboval'));
        },
      });
    });
    $b.ajaxStop(function() {
        $(this).val($(this).attr('roboval'));
    });
  } else {
    $b.click(function() {
      $(this).addClass('selected');
      var data=build_data(sid);
      data.screen='norobot';
      data.button=$(this).attr('tid');
      $.ajax({ data: data,
        global: false,
        success: function(response) {
          for(var param in response) {
            if(param.match(/^v-/)) $("#"+param).val(response[param]);
          }
          $("#i div.screen:last-child input").each(function() {
            // copy info into input fields
            if ($(this).attr('type') == 'checkbox') {
              $(this).prop('checked', true);
            } else if ($(this).attr('type') != 'button') {
              if($("#v-"+$(this).attr('id')).val()) {
                $(this).val($("#v-"+$(this).attr('id')).val());
              }
            }
          });
          robot_check();
        },
        complete: function(data, status) {
        },
      });

      show_screen($(this).attr('tid'));
    });
      if(sid == "root") {
          $b.val(title).attr('class', 'b-root');
          $b.val(title).attr('roboval', $b.val());
          $b.val(title).prop('disabled', true);
          $b.ajaxStop(function() {
              $(this).val($(this).attr('roboval'));
          });
      }
    }
} //}}}

function build_data(sid) { //#{{{1
    var data={ 'call-id': $('#v-call-id').val(), screen: sid, timestamp: new Date().getTime() };
    $("#o div.element").each(function() {
        var field=$(this).attr('id').replace(/^r-/, '');
        if($("#v-"+field).val() && screens[sid].requires && screens[sid].requiresSet[field])
            data[field]=$("#v-"+field).val();
    });
    return data;
} //}}}

jQuery.fn.validate = function() { //{{{1
    return this.each(function() {
        var val=$(this).val();
        var valid=true;
        if(val) {
            if($(this).hasClass('ip'))
                valid=val.match(/^64\.198\.(214|215|255)\.[12]?[0-9]?[0-9]$/);
                if (!valid) {
                    valid=val.match(/^76\.191\.(16|17|18|19|20|21|22|23|24|25)\.[12]?[0-9]?[0-9]|208\.88\.20[0-2]\.[12]?[0-9]?[0-9]$/);
                }
            else if($(this).hasClass('zip'))
                valid=val.match(/^\d{5}$/);
            else if($(this).hasClass('account') || $(this).hasClass('ticket'))
                valid=val.match(/^\d{1,8}$/);
            else if($(this).hasClass('phone')) {
                val=val.replace(/[^0-9]/gi, '');
                valid=val.match(/^\d{10}$/);
                if(valid) {
                    $(this).val(val.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3'));
                    if ($(this).val() == "217-367-8656") {
                        valid=false;
                    } else {
                        // XXX can this be generalized? what are the side-effects?
                        $("#r-"+$(this).attr('name')+" div.value :first-child").val($(this).val());
                    }
                }
            }
            else if(val.match(/^-+$/))
                valid=false;
            if($(this).attr('type') == 'date') {
                var val_timezone;
                var now = new Date();
                var date;
                if ($('#hour').val()) {
                    val_timezone = val + "T" + $('#hour').val() + ":00:00.000-0600";
                } else {
                    val_timezone = val + "T00:00:00.000-0600";
                    now.setHours(0);
                    now.setMinutes(0);
                    now.setSeconds(0);
                }
                date = new Date(val_timezone);
                if (date < now) {
                    valid=false;
                }
            }
        }
        if(valid) $(this).removeClass('invalid');
        else $(this).addClass('invalid');
    });
} //}}}

jQuery.fn.log = function(msg) { //{{{1
    if(debug) { msg ? console.log("%s: %o", msg, this) : console.log("%o", msg, this); }
    return this;
}; //}}}

// Date.prototype.format:{{{1
// a PHP date like function, for formatting date strings
// authored by Svend Tofte <www.svendtofte.com>
// the code is in the public domain
//
// see http://www.svendtofte.com/javascript/javascript-date-string-formatting/
// and http://www.php.net/date
//
// thanks to 
//  - Daniel Berlin <mail@daniel-berlin.de>,
//    major overhaul and improvements
//  - Matt Bannon,
//    correcting some stupid bugs in my days-in-the-months list!
//  - levon ghazaryan. pointing out an error in z switch.
//  - Andy Pemberton. pointing out error in c switch 
//
// input : format string
// time : epoch time (seconds, and optional)
//
// if time is not passed, formatting is based on 
// the current "this" date object's set time.
//
// supported switches are
// a, A, B, c, d, D, F, g, G, h, H, i, I (uppercase i), j, l (lowecase L), 
// L, m, M, n, N, O, P, r, s, S, t, U, w, W, y, Y, z, Z
// 
// unsupported (as compared to date in PHP 5.1.3)
// T, e, o

Date.prototype.format = function (input,time) {
    
    var daysLong =    ["Sunday", "Monday", "Tuesday", "Wednesday", 
                       "Thursday", "Friday", "Saturday"];
    var daysShort =   ["Sun", "Mon", "Tue", "Wed", 
                       "Thu", "Fri", "Sat"];
    var monthsShort = ["Jan", "Feb", "Mar", "Apr",
                       "May", "Jun", "Jul", "Aug", "Sep",
                       "Oct", "Nov", "Dec"];
    var monthsLong =  ["January", "February", "March", "April",
                       "May", "June", "July", "August", "September",
                       "October", "November", "December"];

    var switches = { // switches object
        
        a : function () {
            // Lowercase Ante meridiem and Post meridiem
            return date.getHours() > 11? "pm" : "am";
        },
        
        A : function () {
            // Uppercase Ante meridiem and Post meridiem
            return (this.a().toUpperCase ());
        },
    
        B : function (){
            // Swatch internet time. code simply grabbed from ppk,
            // since I was feeling lazy:
            // http://www.xs4all.nl/~ppk/js/beat.html
            var off = (date.getTimezoneOffset() + 60)*60;
            var theSeconds = (date.getHours() * 3600) + 
                             (date.getMinutes() * 60) + 
                              date.getSeconds() + off;
            var beat = Math.floor(theSeconds/86.4);
            if (beat > 1000) beat -= 1000;
            if (beat < 0) beat += 1000;
            if ((String(beat)).length == 1) beat = "00"+beat;
            if ((String(beat)).length == 2) beat = "0"+beat;
            return beat;
        },
        
        c : function () {
            // ISO 8601 date (e.g.: "2004-02-12T15:19:21+00:00"), as per
            // http://www.cl.cam.ac.uk/~mgk25/iso-time.html
            return (this.Y() + "-" + this.m() + "-" + this.d() + "T" + 
                    this.H() + ":" + this.i() + ":" + this.s() + this.P());
        },
        
        d : function () {
            // Day of the month, 2 digits with leading zeros
            var j = String(this.j());
            return (j.length == 1 ? "0"+j : j);
        },
        
        D : function () {
            // A textual representation of a day, three letters
            return daysShort[date.getDay()];
        },
        
        F : function () {
            // A full textual representation of a month
            return monthsLong[date.getMonth()];
        },
        
        g : function () {
           // 12-hour format of an hour without leading zeros, 1 through 12!
           if (date.getHours() == 0) {
               return 12;
           } else {
               return date.getHours()>12 ? date.getHours()-12 : date.getHours();
           }
       },
        
        G : function () {
            // 24-hour format of an hour without leading zeros
            return date.getHours();
        },
        
        h : function () {
            // 12-hour format of an hour with leading zeros
            var g = String(this.g());
            return (g.length == 1 ? "0"+g : g);
        },
        
        H : function () {
            // 24-hour format of an hour with leading zeros
            var G = String(this.G());
            return (G.length == 1 ? "0"+G : G);
        },
        
        i : function () {
            // Minutes with leading zeros
            var min = String (date.getMinutes ());
            return (min.length == 1 ? "0" + min : min);
        },
        
        I : function () {
            // Whether or not the date is in daylight saving time (DST)
            // note that this has no bearing in actual DST mechanics,
            // and is just a pure guess. buyer beware.
            var noDST = new Date ("January 1 " + this.Y() + " 00:00:00");
            return (noDST.getTimezoneOffset () == 
                    date.getTimezoneOffset () ? 0 : 1);
        },
        
        j : function () {
            // Day of the month without leading zeros
            return date.getDate();
        },
        
        l : function () {
            // A full textual representation of the day of the week
            return daysLong[date.getDay()];
        },
        
        L : function () {
            // leap year or not. 1 if leap year, 0 if not.
            // the logic should match iso's 8601 standard.
            // http://www.uic.edu/depts/accc/software/isodates/leapyear.html
            var Y = this.Y();
            if (         
                (Y % 4 == 0 && Y % 100 != 0) ||
                (Y % 4 == 0 && Y % 100 == 0 && Y % 400 == 0)
                ) {
                return 1;
            } else {
                return 0;
            }
        },
        
        m : function () {
            // Numeric representation of a month, with leading zeros
            var n = String(this.n());
            return (n.length == 1 ? "0"+n : n);
        },
        
        M : function () {
            // A short textual representation of a month, three letters
            return monthsShort[date.getMonth()];
        },
        
        n : function () {
            // Numeric representation of a month, without leading zeros
            return date.getMonth()+1;
        },
        
        N : function () {
            // ISO-8601 numeric representation of the day of the week
            var w = this.w();
            return (w == 0 ? 7 : w);
        },
        
        O : function () {
            // Difference to Greenwich time (GMT) in hours
            var os = Math.abs(date.getTimezoneOffset());
            var h = String(Math.floor(os/60));
            var m = String(os%60);
            h.length == 1? h = "0"+h:1;
            m.length == 1? m = "0"+m:1;
            return date.getTimezoneOffset() < 0 ? "+"+h+m : "-"+h+m;
        },
        
        P : function () {
            // Difference to GMT, with colon between hours and minutes
            var O = this.O();
            return (O.substr(0, 3) + ":" + O.substr(3, 2));
        },      
        
        r : function () {
            // RFC 822 formatted date
            var r; // result
            //  Thu         ,     21               Dec              2000
            r = this.D() + ", " + this.d() + " " + this.M() + " " + this.Y() +
            //    16          :    01          :    07               0200
            " " + this.H() + ":" + this.i() + ":" + this.s() + " " + this.O();
            return r;
        },

        s : function () {
            // Seconds, with leading zeros
            var sec = String (date.getSeconds ());
            return (sec.length == 1 ? "0" + sec : sec);
        },        
        
        S : function () {
            // English ordinal suffix for the day of the month, 2 characters
            switch (date.getDate ()) {
                case  1: return ("st"); 
                case  2: return ("nd"); 
                case  3: return ("rd");
                case 21: return ("st"); 
                case 22: return ("nd"); 
                case 23: return ("rd");
                case 31: return ("st");
                default: return ("th");
            }
        },
        
        t : function () {
            // thanks to Matt Bannon for some much needed code-fixes here!
            var daysinmonths = [null,31,28,31,30,31,30,31,31,30,31,30,31];
            if (this.L()==1 && this.n()==2) return 29; // ~leap day
            return daysinmonths[this.n()];
        },
        
        U : function () {
            // Seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)
            return Math.round(date.getTime()/1000);
        },

        w : function () {
            // Numeric representation of the day of the week
            return date.getDay();
        },
        
        W : function () {
            // Weeknumber, as per ISO specification:
            // http://www.cl.cam.ac.uk/~mgk25/iso-time.html
        
            var DoW = this.N ();
            var DoY = this.z ();

            // If the day is 3 days before New Year's Eve and is Thursday or earlier,
            // it's week 1 of next year.
            var daysToNY = 364 + this.L () - DoY;
            if (daysToNY <= 2 && DoW <= (3 - daysToNY)) {
                return 1;
            }

            // If the day is within 3 days after New Year's Eve and is Friday or later,
            // it belongs to the old year.
            if (DoY <= 2 && DoW >= 5) {
                return new Date (this.Y () - 1, 11, 31).format("W");
            }
            
            var nyDoW = new Date (this.Y (), 0, 1).getDay ();
            nyDoW = nyDoW != 0 ? nyDoW - 1 : 6;

            if (nyDoW <= 3) { // First day of the year is a Thursday or earlier
                return (1 + Math.floor ((DoY + nyDoW) / 7));
            } else {  // First day of the year is a Friday or later
                return (1 + Math.floor ((DoY - (7 - nyDoW)) / 7));
            }
        },
        
        y : function () {
            // A two-digit representation of a year
            var y = String(this.Y());
            return y.substring(y.length-2,y.length);
        },        
        
        Y : function () {
            // A full numeric representation of a year, 4 digits
    
            // we first check, if getFullYear is supported. if it
            // is, we just use that. ppks code is nice, but wont
            // work with dates outside 1900-2038, or something like that
            if (date.getFullYear) {
                var newDate = new Date("January 1 2001 00:00:00 +0000");
                var x = newDate .getFullYear();
                if (x == 2001) {              
                    // i trust the method now
                    return date.getFullYear();
                }
            }
            // else, do this:
            // codes thanks to ppk:
            // http://www.xs4all.nl/~ppk/js/introdate.html
            var x = date.getYear();
            var y = x % 100;
            y += (y < 38) ? 2000 : 1900;
            return y;
        },

        
        z : function () {
            // The day of the year, zero indexed! 0 through 366
            var s = "January 1 " + this.Y() + " 00:00:00 GMT" + this.O();
            var t = new Date(s);
            var diff = date.getTime() - t.getTime();
            return Math.floor(diff/1000/60/60/24);
        },

        Z : function () {
            // Timezone offset in seconds
            return (date.getTimezoneOffset () * -60);
        }        
    
    }

    function getSwitch(str) {
        if (switches[str] != undefined) {
            return switches[str]();
        } else {
            return str;
        }
    }

    var date;
    if (time) {
        var date = new Date (time);
    } else {
        var date = this;
    }

    var formatString = input.split("");
    var i = 0;
    while (i < formatString.length) {
        if (formatString[i] == "%") {
            // this is our way of allowing users to escape stuff
            formatString.splice(i,1);
        } else {
            formatString[i] = getSwitch(formatString[i]);
        }
        i++;
    }
    
    return formatString.join("");
}


// Some (not all) predefined format strings from PHP 5.1.1, which 
// offer standard date representations.
// See: http://www.php.net/manual/en/ref.datetime.php#datetime.constants
//

// Atom      "2005-08-15T15:52:01+00:00"
Date.DATE_ATOM    = "Y-m-d%TH:i:sP";
// ISO-8601  "2005-08-15T15:52:01+0000"
Date.DATE_ISO8601 = "Y-m-d%TH:i:sO";
// RFC 2822  "Mon, 15 Aug 2005 15:52:01 +0000"
Date.DATE_RFC2822 = "D, d M Y H:i:s O";
// W3C       "2005-08-15 15:52:01+00:00"
Date.DATE_W3C     = "Y-m-d%TH:i:sP";

// vim:foldmethod=marker
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
/*
 * jQuery Autocomplete plugin 1.1
 *
 * Copyright (c) 2009 Jörn Zaefferer
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * Revision: $Id: jquery.autocomplete.js 15 2009-08-22 10:30:27Z joern.zaefferer $
 */

;(function($) {
	
$.fn.extend({
	autocomplete: function(urlOrData, options) {
		var isUrl = typeof urlOrData == "string";
		options = $.extend({}, $.Autocompleter.defaults, {
			url: isUrl ? urlOrData : null,
			data: isUrl ? null : urlOrData,
			delay: isUrl ? $.Autocompleter.defaults.delay : 10,
			max: options && !options.scroll ? 10 : 150
		}, options);
		
		// if highlight is set to false, replace it with a do-nothing function
		options.highlight = options.highlight || function(value) { return value; };
		
		// if the formatMatch option is not specified, then use formatItem for backwards compatibility
		options.formatMatch = options.formatMatch || options.formatItem;
		
		return this.each(function() {
			new $.Autocompleter(this, options);
		});
	},
	result: function(handler) {
		return this.bind("result", handler);
	},
	search: function(handler) {
		return this.trigger("search", [handler]);
	},
	flushCache: function() {
		return this.trigger("flushCache");
	},
	setOptions: function(options){
		return this.trigger("setOptions", [options]);
	},
	unautocomplete: function() {
		return this.trigger("unautocomplete");
	}
}); 

$.Autocompleter = function(input, options) {

	var KEY = {
		UP: 38,
		DOWN: 40,
		DEL: 46,
		TAB: 9,
		RETURN: 13,
		ESC: 27,
		COMMA: 188,
		PAGEUP: 33,
		PAGEDOWN: 34,
		BACKSPACE: 8
	};

	// Create $ object for input element
	var $input = $(input).attr("autocomplete", "off").addClass(options.inputClass);

	var timeout;
	var previousValue = "";
	var cache = $.Autocompleter.Cache(options);
	var hasFocus = 0;
	var lastKeyPressCode;
	var config = {
		mouseDownOnSelect: false
	};
	var select = $.Autocompleter.Select(options, input, selectCurrent, config);
	
	var blockSubmit;
	

	
	function selectCurrent() {
		var selected = select.selected();
		if( !selected )
			return false;
		
		var v = selected.result;
		previousValue = v;
		
		if ( options.multiple ) {
			var words = trimWords($input.val());
			if ( words.length > 1 ) {
				var seperator = options.multipleSeparator.length;
				var cursorAt = $(input).selection().start;
				var wordAt, progress = 0;
				$.each(words, function(i, word) {
					progress += word.length;
					if (cursorAt <= progress) {
						wordAt = i;
						return false;
					}
					progress += seperator;
				});
				words[wordAt] = v;
				// TODO this should set the cursor to the right position, but it gets overriden somewhere
				//$.Autocompleter.Selection(input, progress + seperator, progress + seperator);
				v = words.join( options.multipleSeparator );
			}
			v += options.multipleSeparator;
		}
		
		$input.val(v);
		hideResultsNow();
		$input.trigger("result", [selected.data, selected.value]);
		return true;
	}
	
	function onChange(crap, skipPrevCheck) {
		if( lastKeyPressCode == KEY.DEL ) {
			select.hide();
			return;
		}
		
		var currentValue = $input.val();
		
		if ( !skipPrevCheck && currentValue == previousValue )
			return;
		
		previousValue = currentValue;
		
		currentValue = lastWord(currentValue);
		if ( currentValue.length >= options.minChars) {
			$input.addClass(options.loadingClass);
			if (!options.matchCase)
				currentValue = currentValue.toLowerCase();
			request(currentValue, receiveData, hideResultsNow);
		} else {
			stopLoading();
			select.hide();
		}
	};
	
	function trimWords(value) {
		if (!value)
			return [""];
		if (!options.multiple)
			return [$.trim(value)];
		return $.map(value.split(options.multipleSeparator), function(word) {
			return $.trim(value).length ? $.trim(word) : null;
		});
	}
	
	function lastWord(value) {
		if ( !options.multiple )
			return value;
		var words = trimWords(value);
		if (words.length == 1) 
			return words[0];
		var cursorAt = $(input).selection().start;
		if (cursorAt == value.length) {
			words = trimWords(value)
		} else {
			words = trimWords(value.replace(value.substring(cursorAt), ""));
		}
		return words[words.length - 1];
	}
	
	// fills in the input box w/the first match (assumed to be the best match)
	// q: the term entered
	// sValue: the first matching result
	function autoFill(q, sValue){
		// autofill in the complete box w/the first match as long as the user hasn't entered in more data
		// if the last user key pressed was backspace, don't autofill
		if( options.autoFill && (lastWord($input.val()).toLowerCase() == q.toLowerCase()) && lastKeyPressCode != KEY.BACKSPACE ) {
			// fill in the value (keep the case the user has typed)
			$input.val($input.val() + sValue.substring(lastWord(previousValue).length));
			// select the portion of the value not typed by the user (so the next character will erase)
			$(input).selection(previousValue.length, previousValue.length + sValue.length);
		}
	};

	function hideResults() {
		clearTimeout(timeout);
		timeout = setTimeout(hideResultsNow, 200);
	};

	function hideResultsNow() {
		var wasVisible = select.visible();
		select.hide();
		clearTimeout(timeout);
		stopLoading();
		if (options.mustMatch) {
			// call search and run callback
			$input.search(
				function (result){
					// if no value found, clear the input box
					if( !result ) {
						if (options.multiple) {
							var words = trimWords($input.val()).slice(0, -1);
							$input.val( words.join(options.multipleSeparator) + (words.length ? options.multipleSeparator : "") );
						}
						else {
							$input.val( "" );
							$input.trigger("result", null);
						}
					}
				}
			);
		}
	};

	function receiveData(q, data) {
		if ( data && data.length && hasFocus ) {
			stopLoading();
			select.display(data, q);
			autoFill(q, data[0].value);
			select.show();
		} else {
			hideResultsNow();
		}
	};

	function request(term, success, failure) {
		if (!options.matchCase)
			term = term.toLowerCase();
		var data = cache.load(term);
		// recieve the cached data
		if (data && data.length) {
			success(term, data);
		// if an AJAX url has been supplied, try loading the data now
		} else if( (typeof options.url == "string") && (options.url.length > 0) ){
			
			var extraParams = {
				timestamp: +new Date()
			};
			$.each(options.extraParams, function(key, param) {
				extraParams[key] = typeof param == "function" ? param() : param;
			});
			
			$.ajax({
				// try to leverage ajaxQueue plugin to abort previous requests
				mode: "abort",
				// limit abortion to this input
				port: "autocomplete" + input.name,
				dataType: options.dataType,
				url: options.url,
				data: $.extend({
					q: lastWord(term),
					limit: options.max
				}, extraParams),
				success: function(data) {
					var parsed = options.parse && options.parse(data) || parse(data);
					cache.add(term, parsed);
					success(term, parsed);
				}
			});
		} else {
			// if we have a failure, we need to empty the list -- this prevents the the [TAB] key from selecting the last successful match
			select.emptyList();
			failure(term);
		}
	};
	
	function parse(data) {
		var parsed = [];
		var rows = data.split("\n");
		for (var i=0; i < rows.length; i++) {
			var row = $.trim(rows[i]);
			if (row) {
				row = row.split("|");
				parsed[parsed.length] = {
					data: row,
					value: row[0],
					result: options.formatResult && options.formatResult(row, row[0]) || row[0]
				};
			}
		}
		return parsed;
	};

	function stopLoading() {
		$input.removeClass(options.loadingClass);
	};

};

$.Autocompleter.defaults = {
	inputClass: "ac_input",
	resultsClass: "ac_results",
	loadingClass: "ac_loading",
	minChars: 1,
	delay: 400,
	matchCase: false,
	matchSubset: true,
	matchContains: false,
	cacheLength: 10,
	max: 100,
	mustMatch: false,
	extraParams: {},
	selectFirst: true,
	formatItem: function(row) { return row[0]; },
	formatMatch: null,
	autoFill: false,
	width: 0,
	multiple: false,
	multipleSeparator: ", ",
	highlight: function(value, term) {
		return value.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + term.replace(/([\^\$\(\)\[\]\{\}\*\.\+\?\|\\])/gi, "\\$1") + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>");
	},
    scroll: true,
    scrollHeight: 180
};

$.Autocompleter.Cache = function(options) {

	var data = {};
	var length = 0;
	
	function matchSubset(s, sub) {
		if (!options.matchCase) 
			s = s.toLowerCase();
		var i = s.indexOf(sub);
		if (options.matchContains == "word"){
			i = s.toLowerCase().search("\\b" + sub.toLowerCase());
		}
		if (i == -1) return false;
		return i == 0 || options.matchContains;
	};
	
	function add(q, value) {
		if (length > options.cacheLength){
			flush();
		}
		if (!data[q]){ 
			length++;
		}
		data[q] = value;
	}
	
	function populate(){
		if( !options.data ) return false;
		// track the matches
		var stMatchSets = {},
			nullData = 0;

		// no url was specified, we need to adjust the cache length to make sure it fits the local data store
		if( !options.url ) options.cacheLength = 1;
		
		// track all options for minChars = 0
		stMatchSets[""] = [];
		
		// loop through the array and create a lookup structure
		for ( var i = 0, ol = options.data.length; i < ol; i++ ) {
			var rawValue = options.data[i];
			// if rawValue is a string, make an array otherwise just reference the array
			rawValue = (typeof rawValue == "string") ? [rawValue] : rawValue;
			
			var value = options.formatMatch(rawValue, i+1, options.data.length);
			if ( value === false )
				continue;
				
			var firstChar = value.charAt(0).toLowerCase();
			// if no lookup array for this character exists, look it up now
			if( !stMatchSets[firstChar] ) 
				stMatchSets[firstChar] = [];

			// if the match is a string
			var row = {
				value: value,
				data: rawValue,
				result: options.formatResult && options.formatResult(rawValue) || value
			};
			
			// push the current match into the set list
			stMatchSets[firstChar].push(row);

			// keep track of minChars zero items
			if ( nullData++ < options.max ) {
				stMatchSets[""].push(row);
			}
		};

		// add the data items to the cache
		$.each(stMatchSets, function(i, value) {
			// increase the cache size
			options.cacheLength++;
			// add to the cache
			add(i, value);
		});
	}
	
	// populate any existing data
	setTimeout(populate, 25);
	
	function flush(){
		data = {};
		length = 0;
	}
	
	return {
		flush: flush,
		add: add,
		populate: populate,
		load: function(q) {
			if (!options.cacheLength || !length)
				return null;
			/* 
			 * if dealing w/local data and matchContains than we must make sure
			 * to loop through all the data collections looking for matches
			 */
			if( !options.url && options.matchContains ){
				// track all matches
				var csub = [];
				// loop through all the data grids for matches
				for( var k in data ){
					// don't search through the stMatchSets[""] (minChars: 0) cache
					// this prevents duplicates
					if( k.length > 0 ){
						var c = data[k];
						$.each(c, function(i, x) {
							// if we've got a match, add it to the array
							if (matchSubset(x.value, q)) {
								csub.push(x);
							}
						});
					}
				}				
				return csub;
			} else 
			// if the exact item exists, use it
			if (data[q]){
				return data[q];
			} else
			if (options.matchSubset) {
				for (var i = q.length - 1; i >= options.minChars; i--) {
					var c = data[q.substr(0, i)];
					if (c) {
						var csub = [];
						$.each(c, function(i, x) {
							if (matchSubset(x.value, q)) {
								csub[csub.length] = x;
							}
						});
						return csub;
					}
				}
			}
			return null;
		}
	};
};

$.Autocompleter.Select = function (options, input, select, config) {
	var CLASSES = {
		ACTIVE: "ac_over"
	};
	
	var listItems,
		active = -1,
		data,
		term = "",
		needsInit = true,
		element,
		list;
	
	// Create results
	function init() {
		if (!needsInit)
			return;
		element = $("<div/>")
		.hide()
		.addClass(options.resultsClass)
		.css("position", "absolute")
		.appendTo(document.body);
	
		list = $("<ul/>").appendTo(element).mouseover( function(event) {
			if(target(event).nodeName && target(event).nodeName.toUpperCase() == 'LI') {
	            active = $("li", list).removeClass(CLASSES.ACTIVE).index(target(event));
			    $(target(event)).addClass(CLASSES.ACTIVE);            
	        }
		}).click(function(event) {
			$(target(event)).addClass(CLASSES.ACTIVE);
			select();
			// TODO provide option to avoid setting focus again after selection? useful for cleanup-on-focus
			input.focus();
			return false;
		}).mousedown(function() {
			config.mouseDownOnSelect = true;
		}).mouseup(function() {
			config.mouseDownOnSelect = false;
		});
		
		if( options.width > 0 )
			element.css("width", options.width);
			
		needsInit = false;
	} 
	
	function target(event) {
		var element = event.target;
		while(element && element.tagName != "LI")
			element = element.parentNode;
		// more fun with IE, sometimes event.target is empty, just ignore it then
		if(!element)
			return [];
		return element;
	}

	function moveSelect(step) {
		listItems.slice(active, active + 1).removeClass(CLASSES.ACTIVE);
		movePosition(step);
        var activeItem = listItems.slice(active, active + 1).addClass(CLASSES.ACTIVE);
        if(options.scroll) {
            var offset = 0;
            listItems.slice(0, active).each(function() {
				offset += this.offsetHeight;
			});
            if((offset + activeItem[0].offsetHeight - list.scrollTop()) > list[0].clientHeight) {
                list.scrollTop(offset + activeItem[0].offsetHeight - list.innerHeight());
            } else if(offset < list.scrollTop()) {
                list.scrollTop(offset);
            }
        }
	};
	
	function movePosition(step) {
		active += step;
		if (active < 0) {
			active = listItems.size() - 1;
		} else if (active >= listItems.size()) {
			active = 0;
		}
	}
	
	function limitNumberOfItems(available) {
		return options.max && options.max < available
			? options.max
			: available;
	}
	
	function fillList() {
		list.empty();
		var max = limitNumberOfItems(data.length);
		for (var i=0; i < max; i++) {
			if (!data[i])
				continue;
			var formatted = options.formatItem(data[i].data, i+1, max, data[i].value, term);
			if ( formatted === false )
				continue;
			var li = $("<li/>").html( options.highlight(formatted, term) ).addClass(i%2 == 0 ? "ac_even" : "ac_odd").appendTo(list)[0];
			$.data(li, "ac_data", data[i]);
		}
		listItems = list.find("li");
		if ( options.selectFirst ) {
			listItems.slice(0, 1).addClass(CLASSES.ACTIVE);
			active = 0;
		}
		// apply bgiframe if available
		if ( $.fn.bgiframe )
			list.bgiframe();
	}
	
	return {
		display: function(d, q) {
			init();
			data = d;
			term = q;
			fillList();
		},
		next: function() {
			moveSelect(1);
		},
		prev: function() {
			moveSelect(-1);
		},
		pageUp: function() {
			if (active != 0 && active - 8 < 0) {
				moveSelect( -active );
			} else {
				moveSelect(-8);
			}
		},
		pageDown: function() {
			if (active != listItems.size() - 1 && active + 8 > listItems.size()) {
				moveSelect( listItems.size() - 1 - active );
			} else {
				moveSelect(8);
			}
		},
		hide: function() {
			element && element.hide();
			listItems && listItems.removeClass(CLASSES.ACTIVE);
			active = -1;
		},
		visible : function() {
			return element && element.is(":visible");
		},
		current: function() {
			return this.visible() && (listItems.filter("." + CLASSES.ACTIVE)[0] || options.selectFirst && listItems[0]);
		},
		show: function() {
			var offset = $(input).offset();
			element.css({
				width: typeof options.width == "string" || options.width > 0 ? options.width : $(input).width(),
				top: offset.top + input.offsetHeight,
				left: offset.left
			}).show();
            if(options.scroll) {
                list.scrollTop(0);
                list.css({
					maxHeight: options.scrollHeight,
					overflow: 'auto'
				});
				
                if($.browser.msie && typeof document.body.style.maxHeight === "undefined") {
					var listHeight = 0;
					listItems.each(function() {
						listHeight += this.offsetHeight;
					});
					var scrollbarsVisible = listHeight > options.scrollHeight;
                    list.css('height', scrollbarsVisible ? options.scrollHeight : listHeight );
					if (!scrollbarsVisible) {
						// IE doesn't recalculate width when scrollbar disappears
						listItems.width( list.width() - parseInt(listItems.css("padding-left")) - parseInt(listItems.css("padding-right")) );
					}
                }
                
            }
		},
		selected: function() {
			var selected = listItems && listItems.filter("." + CLASSES.ACTIVE).removeClass(CLASSES.ACTIVE);
			return selected && selected.length && $.data(selected[0], "ac_data");
		},
		emptyList: function (){
			list && list.empty();
		},
		unbind: function() {
			element && element.remove();
		}
	};
};

$.fn.selection = function(start, end) {
	if (start !== undefined) {
		return this.each(function() {
			if( this.createTextRange ){
				var selRange = this.createTextRange();
				if (end === undefined || start == end) {
					selRange.move("character", start);
					selRange.select();
				} else {
					selRange.collapse(true);
					selRange.moveStart("character", start);
					selRange.moveEnd("character", end);
					selRange.select();
				}
			} else if( this.setSelectionRange ){
				this.setSelectionRange(start, end);
			} else if( this.selectionStart ){
				this.selectionStart = start;
				this.selectionEnd = end;
			}
		});
	}
	var field = this[0];
	if ( field.createTextRange ) {
		var range = document.selection.createRange(),
			orig = field.value,
			teststring = "<->",
			textLength = range.text.length;
		range.text = teststring;
		var caretAt = field.value.indexOf(teststring);
		field.value = orig;
		this.selection(caretAt, caretAt + textLength);
		return {
			start: caretAt,
			end: caretAt + textLength
		}
	} else if( field.selectionStart !== undefined ){
		return {
			start: field.selectionStart,
			end: field.selectionEnd
		}
	}
};

})(jQuery);
//]]>
</script>

<script type="text/javascript" src="geolocate.js" async defer></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAW05P51PQsDWL8JUjUlI7no-ds2FdaI8E&libraries=places" async defer></script>
</body>

</html>

<!-- vim: set foldmethod=marker: -->
