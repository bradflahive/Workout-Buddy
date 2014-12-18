/**
 * Application JS
 */
(function() {

	var form = new ReptileForm('form');

	// Do something before validation starts
	form.on('beforeValidation', function() {
		$('.notices').removeClass('on error').html('');
	});

	// Do something when errors are detected.
	form.on('validationError', function(e, err) {

		var notices = $('.notices');

		for (i in err) {
			var p = $('<p><i class="fa fa-exclamation-circle"></i> Error for </p>');
			p.append(err[i].title + ': ' + err[i].msg);
			notices.append(p);
		}

		notices.addClass('on error');

		$('body').find('.errormsg').html('<p>Unable to match the Username and Password.<br>Please try again.</p>');
	});

	// Do something after validation is successful, but before the form submits.
	// form.on('beforeSubmit', function() {
	// 	// $('.buddies').append();        clear buddies?
	// });

	// Do something when the AJAX request has returned in success
	form.on('xhrSuccess', function(e, data) {
		$('.buddies').html('');

		$(data.matches).each(function(idx) {
			$('.buddies').append('<div class="buddy"><div class="user"><img src="' + data.matches[idx].photo + '"><h4>' +
				data.matches[idx].first_name + ' ' + data.matches[idx].last_name + '</h4><div class="age"> Age: ' +
				data.matches[idx].age + '</div><div class="member"> Member Since: ' + data.matches[idx].member_since +
				'</div></div><div class="invite">Invite</div></div>');
		});

		if(data.matches == 0) {
			$('.buddies').append('<div class="empty"><p><i class="fa fa-exclamation-circle"></i> Sorry, no matches yet!</p></div>');
		}

		if(data.redirect) {
			location.href=data.redirect;
		}
	});

	// hides the e-mail input on load
	$('.login-form .email').attr('hidden', '');

	//adds e-mail field for signup when signup is pressed on home page
	$('.login-form').on('click', 'button.sign-up', function(e) {
		e.preventDefault();
		$(this).hide();
        $('.login-form .email').toggle(); 
	});
	
	//scrolling options on 'add' page 
	$('add').click(function(){   
		$('.buddies').scroll({ scrollTop: 1000 }, 2000);
	});

	//scrolling options on 'schedule' page
	$(document).ready(function(){    
		$('event-content').scroll({ scrollTop: 1000 }, 2000);
	});

	//toggle BUDDY invite/invited
	$('.buddies').on('click', '.invite', function(e){
		e.preventDefault();
		var invited = $(this).html() == 'Invited' ? 'Invite' : 'Invited';
		$(this).html(invited).toggleClass('invited');
		var	above = $(this).parents('.buddy');
		var selected = $('form');
		var invite_data = {
			name: above.find('h4').text(),
			day: selected.find('#day1').val(),
			activity: selected.find('#activity1').val(),
			location: selected.find('#location1').val(),
			time: selected.find('#time1').val(),
			intensity: selected.find('#intensity1').val()
		};
		$.ajax({
	 			url: "/add_buddy",
				type: "POST",
				data: invite_data,
			});
		console.log(invite_data);
	});

	//bail button action
	$('.event-info').on('click', 'div.bail', function(e){
		e.preventDefault();
		var check = $(this).html();
		if(check == 'bail') {
			$(this).html('Are you sure?');
		} else {
			var	parent = $(this).parents('.event-info');
			var bail_data = {
				location: parent.find('.loc-id').val(),
				activity: parent.find('.activ-id').val(),
				day: parent.find('.day-id').val(),
				time: parent.find('.time-id').val()
			};
			$.ajax({
	 			url: "/delete_schedule",
				type: "POST",
				data: bail_data,
				success: function(){
					parent.remove();
				}
			});
		}

	});

	// Append dropdown choice
	$(window).load(function() {
		// Append Day 
    var eSelect3 = document.getElementById('day1');
    var optOtherReason3 = document.getElementById('displayresponse-day');
    var options3 = eSelect3.getElementsByTagName("option");
    	// Append Time
    var eSelect4 = document.getElementById('time1');
    var optOtherReason4 = document.getElementById('displayresponse-time');
    var options4 = eSelect4.getElementsByTagName("option");
		// Append Activity 
    var eSelect = document.getElementById('activity1');
    var optOtherReason = document.getElementById('displayresponse-activity');
    var options = eSelect.getElementsByTagName("option");
    	// Append Intensity
    var eSelect2 = document.getElementById('intensity1');
    var optOtherReason2 = document.getElementById('displayresponse-intensity');
    var options2 = eSelect2.getElementsByTagName("option");
    	// Append Location
    var eSelect5 = document.getElementById('location1');
    var optOtherReason5 = document.getElementById('displayresponse-location');
    var options5 = eSelect5.getElementsByTagName("option");

	eSelect3.onchange = function() {
        var text3 = options3[eSelect3.selectedIndex].innerHTML;
        document.getElementById("displayresponse-day").innerHTML = text3;
	    }
	eSelect4.onchange = function() {
        var text4 = options4[eSelect4.selectedIndex].innerHTML;
        document.getElementById("displayresponse-time").innerHTML = text4;
	    } 
    eSelect.onchange = function() {
        var text = options[eSelect.selectedIndex].innerHTML;
        document.getElementById("displayresponse-activity").innerHTML = text;
	    } 
	eSelect2.onchange = function() {
        var text2 = options2[eSelect2.selectedIndex].innerHTML;
        document.getElementById("displayresponse-intensity").innerHTML = text2;
	    }
	eSelect5.onchange = function() {
        var text5 = options5[eSelect5.selectedIndex].innerHTML;
        document.getElementById("displayresponse-location").innerHTML = text5;
	    }

	});

})();