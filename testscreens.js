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
