/**
*	jQuery.noticeAdd() and jQuery.noticeRemove()
*	These functions create and remove growl-like notices
*		
*   Copyright (c) 2009 Tim Benniks
*
*	Permission is hereby granted, free of charge, to any person obtaining a copy
*	of this software and associated documentation files (the "Software"), to deal
*	in the Software without restriction, including without limitation the rights
*	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
*	copies of the Software, and to permit persons to whom the Software is
*	furnished to do so, subject to the following conditions:
*
*	The above copyright notice and this permission notice shall be included in
*	all copies or substantial portions of the Software.
*
*	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
*	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
*	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
*	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
*	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
*	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
*	THE SOFTWARE.
*	
*	@author 	Tim Benniks <tim@timbenniks.com>
* 	@copyright  2009 timbenniks.com
*	@version    $Id: jquery.notice.js 1 2009-01-24 12:24:18Z timbenniks $
**/
(function(jQuery)
{
	jQuery.extend({			
		noticeAdd: function(options)
		{	
			var defaults = {
				inEffect: 			{opacity: 'show'},	// in effect
				inEffectDuration: 		600,				// in effect duration in miliseconds
				stayTime: 			3000,				// time in miliseconds before the item has to disappear
				date:				'',
				time:				'',
				jobId:  			0,
				text: 				'',					// content of the item
				stay: 				false,				// should the notice item stay or not?
				type: 				'notice' 			// could also be error, succes
			}
			
			// declare varaibles
			var options, noticeWrapAll, noticeItemOuter, noticeItemInner, noticeItemClose;

            options 		= jQuery.extend({}, defaults, options);
			noticeWrapAll	= (!jQuery('.notice-wrap').length) ? jQuery('<div></div>').addClass('notice-wrap').appendTo('body') : jQuery('.notice-wrap');
			noticeItemOuter	= jQuery('<div></div>').addClass('notice-item-wrapper');
			var buttons = "<div class='notice-buttons'><a href='#' onClick='JavaScript:window.open(\"/jobtracker/index.php/crudcontroller/jobLoad/" + options.jobId + "\")' class='floatLeft'>Go To Job Details</a><input name='jobID' value='" + options.jobId + "' id='Job" + options.jobId + "' type='checkbox' checked>Keep reminding</div>"
			var header="<div class='notice-header'><b>Date: </b>" + options.date + "&nbsp;&nbsp;&nbsp;&nbsp;" + "<b>Time: </b>" + options.time + "</div>"
            var text='<div>'+options.text+'</div>';
			noticeItemInner	= jQuery('<div></div>').hide().addClass('notice-item ' + options.type).appendTo(noticeWrapAll).html(buttons + header + text).animate(options.inEffect, options.inEffectDuration).wrap(noticeItemOuter);
            noticeItemClose	= jQuery('<div></div>').addClass('notice-item-close').prependTo(noticeItemInner).html('x').click(function() { jQuery.noticeRemove(noticeItemInner, options.jobId) });
			
			// hmmmz, zucht
			if(navigator.userAgent.match(/MSIE 6/i)) 
			{
		    	noticeWrapAll.css({top: document.documentElement.scrollTop});
		    }
			
			if(!options.stay)
			{
				setTimeout(function()
				{
					jQuery.noticeRemove(noticeItemInner);
				},
				options.stayTime);
			}
		},
		
		noticeRemove: function(obj, jobId)
		{
			obj.animate({opacity: '0'}, 300, function()
			{
				obj.parent().animate({height: '0px'}, 150, function()
				{
					obj.parent().remove();
				});
			});
            var dontRemind = !$("input#Job" + jobId).attr('checked');
            if (dontRemind) {
                var DONT_REMIND_URL = "/jobtracker/index.php/listcontroller/dontRemind/" + jobId;
                $.get(DONT_REMIND_URL, {}, function (data) {});

            }
            opened_notice[jobId] = false; // to mark as closed;
        }
	});
})(jQuery);
