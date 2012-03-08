/*
* Title:  calendar 1.0.0
* Dependencies:  jQuery 1.3.0 +
* Author:  Kyle LeNeau
* Email:  kyle.leneau@gmail.com
* Project Hompage:  http://www.bytecyclist.com/projects/jmonthcalendar
*
* 1/15/2009
*/

(function($) {
    var ids = {
            container: "#calendar",
            head: "#CalendarHead",
            body: "#CalendarBody"
    };
    var    _firstDayOfWeek = 0;
    var _selectedDate;
    var _beginDate;
    var _endDate;
    var calendarEvents;
    var defaults = {
            navLinks: {
                p:'Prev', 
                n:'Next', 
                t:'Today'
            },
            onMonthChanging: function(dateIn) { return true; },
            onMonthChanged: function(dateIn) { return true; },
            onMonthChangedFinish: function(dateIn) { return true; },
            onEventClick: function(event) { return true; },
            locale: {
                days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                weekMin: 'wk'
            }
        };
    var getDateFromId = function(dateIdString) {
        //c_01012009        
        return new Date(dateIdString.substring(6, 10), dateIdString.substring(2, 4)-1, dateIdString.substring(4, 6));
    };
    var getDateId = function(date) {
        var month = ((date.getMonth()+1)<10) ? "0" + (date.getMonth()+1) : (date.getMonth()+1);
        var day = (date.getDate() < 10) ? "0" + date.getDate() : date.getDate();
        return "c_" + month + day + date.getFullYear();
    };
    jQuery.calendar = jQuery.J = function() {};


            
        
    jQuery.J.ExtendDate = function(options) {
        if (Date.prototype.tempDate) {
            return;
        }
        Date.prototype.tempDate = null;
        Date.prototype.months = defaults.locale.months;
        Date.prototype.monthsShort = defaults.locale.monthsShort;
        Date.prototype.days = defaults.locale.days;
        Date.prototype.daysShort = defaults.locale.daysShort;
        Date.prototype.getMonthName = function(fullName) {
            return this[fullName ? 'months' : 'monthsShort'][this.getMonth()];
        };
        Date.prototype.getDayName = function(fullName) {
            return this[fullName ? 'days' : 'daysShort'][this.getDay()];
        };
        Date.prototype.toShortDateString = function() {
            return (this.getMonth()+1) + "/" + this.getDate() + "/" + this.getFullYear();
        };
        Date.prototype.addDays = function (n) {
            this.setDate(this.getDate() + n);
            this.tempDate = this.getDate();
        };
        Date.prototype.addMonths = function (n) {
            if (this.tempDate == null) {
                this.tempDate = this.getDate();
            }
            this.setDate(1);
            this.setMonth(this.getMonth() + n);
            this.setDate(Math.min(this.tempDate, this.getMaxDays()));
        };
        Date.prototype.addYears = function (n) {
            if (this.tempDate == null) {
                this.tempDate = this.getDate();
            }
            this.setDate(1);
            this.setFullYear(this.getFullYear() + n);
            this.setDate(Math.min(this.tempDate, this.getMaxDays()));
        };
        Date.prototype.getMaxDays = function() {
            var tmpDate = new Date(Date.parse(this)),
                d = 28, m;
            m = tmpDate.getMonth();
            d = 28;
            while (tmpDate.getMonth() == m) {
                d ++;
                tmpDate.setDate(d);
            }
            return d - 1;
        };
        Date.prototype.getFirstDay = function() {
            var tmpDate = new Date(Date.parse(this));
            tmpDate.setDate(1);
            return tmpDate.getDay();
        };
        Date.prototype.getWeekNumber = function() {
            var tempDate = new Date(this);
            tempDate.setDate(tempDate.getDate() - (tempDate.getDay() + 6) % 7 + 3);
            var dms = tempDate.valueOf();
            tempDate.setMonth(0);
            tempDate.setDate(4);
            return Math.round((dms - tempDate.valueOf()) / (604800000)) + 1;
        };
        Date.prototype.getDayOfYear = function() {
            var now = new Date(this.getFullYear(), this.getMonth(), this.getDate(), 0, 0, 0);
            var then = new Date(this.getFullYear(), 0, 0, 0, 0, 0);
            var time = now - then;
            return Math.floor(time / 24*60*60*1000);
        };
    }
    
    jQuery.J.DrawCalendar = function(dateIn){
        var today = new Date();
        var d;
        
        if(dateIn == undefined) {
            //start from this month
            d = new Date(today.getFullYear(), today.getMonth(), 1);
        } else {
            //start from the passed in date
            d = dateIn;
            d.setDate(1);
        }
        
        // Create Previous link for later
        var prevMonth = d.getMonth() == 0 ? new Date(d.getFullYear()-1, 11, 1) : new Date(d.getFullYear(), d.getMonth()-1, 1);
        var prevLink = jQuery('<th><a href="javascript:void(0);" class="ir btn-prev button prev_month">&lsaquo;</a></th>').click(function() {
            jQuery.J.ChangeMonth(prevMonth);
            return false;
        });
        
        //Create Next link for later
        var nextMonth = d.getMonth() == 11 ? new Date(d.getFullYear()+1, 0, 1) : new Date(d.getFullYear(), d.getMonth()+1, 1);
        var nextLink = jQuery('<th><a href="javascript:void(0);" class="ir btn-next button next_month">&rsaquo;</a></th>').click(function() {
            jQuery.J.ChangeMonth(nextMonth);
            return false;
        });
        
     //   var todayLink = jQuery('<th><a href="" class="link-today">&rsaquo;</a></th>').click(function() {
//            jQuery.MonthCalendar.changeMonth(today, this);
//            return false;
//        });

        
        //Build up the Header first
        //  Navigation
        var navRow = jQuery('<tr class="MonthNavigation"></tr>');
        navRow.append(prevLink);
        navRow.append(jQuery('<th colspan="5" class="mounth">'+defaults.locale.months[d.getMonth()]+' '+d.getFullYear()+'</th>'));
        
        navRow.append(nextLink);
        navRow = jQuery("<thead></thead>").append(navRow);
        
        //  Days
        var headRow = jQuery("<tr></tr>");
        for (var i=_firstDayOfWeek; i<_firstDayOfWeek+7; i++) {
            var weekday = i%7;
            var wordday = defaults.locale.daysShort[weekday];
            headRow.append('<th>' + wordday + '</th>');
        }
        
        
     //   headRow = headRow.prepend(navRow);


        //Build up the Body
        var tBody = jQuery('<tbody></tbody>');
        
        tBody.append(headRow)
        var isCurrentMonth = (d.getMonth() == today.getMonth() && d.getFullYear() == today.getFullYear());
        var maxDays = d.getMaxDays();
        
        
        //what is the currect day #
        var curDay = _firstDayOfWeek - d.getDay();
        if (curDay > 0) curDay -= 7
        //alert(curDay);
        
        var t = (maxDays + Math.abs(curDay));
        
        _beginDate = new Date(d.getFullYear(), d.getMonth(), curDay+1);
        _endDate = new Date(d.getFullYear(), d.getMonth()+1, (7-(t %= 7)) == 7 ? 0 : (7-(t %= 7)));
        var _currentDate = new Date(_beginDate.getFullYear(), _beginDate.getMonth(), _beginDate.getDate());

        
        // Render calendar
        //<td class=\"DateBox\"><div class=\"DateLabel\"><a href=\"#\">" + val + "</a></div></td>";
        var rowCount = 0;
        do {
              var thisRow = jQuery("<tr></tr>");
                
            for (var i=0; i<7; i++) {
                var weekday = (_firstDayOfWeek + i) % 7;
                var atts = {'class':"",
                            'date':_currentDate.toShortDateString(),
                           'id': getDateId(_currentDate)
               };

                if (curDay < 0 || curDay >= maxDays) {
                    atts['class'] = 'other grey';
                } else {
                    d.setDate(curDay+1);
                }
                    
                if (isCurrentMonth && curDay+1 == today.getDate()) {
                    dayStr = curDay+1;
                    atts['class'] = 'event active event1';
                }
                    
                thisRow.append(jQuery("<td></td>").attr(atts).append( _currentDate.getDate()));
                    
                
                curDay++;
                rowCount++;
                _currentDate.addDays(1);
            }

            tBody.append(thisRow);
        } while (curDay < maxDays);


        var a = jQuery(ids.container);
        var cal = jQuery('<table cellpadding="0" cellspacing="15" border="0"></table>');
        cal = cal.append(navRow, tBody);
        
        a.hide();
        a.html(cal);
        
        a.fadeIn("normal");
    }
    
    var DrawEventsOnCalendar = function() {    
        if (jQuery.isArray(calendarEvents)) {
            jQuery.each(calendarEvents, function(){
                //Get the events that are in the month displayed.
                var ev = this;
                if ((ev.Date >= _beginDate) && (ev.Date <= _endDate)) {
                    var cell = jQuery("#" + getDateId(ev.Date), jQuery(ids.container));
                //    alert(ev.Date);
                 //   var event = jQuery('<div class="Event event2"></div>').append('<a href="' + ev.URL + '">' + ev.Title + '</a>');
               //  var event = jQuery('<div class="Event event2"></div>');
               var atts = {'class':""};
                  atts['class'] = 'event active event2';
                   // event.click(function() {
//                        defaults.onEventClick(ev);
//                    });
                 
               //     event.hide();
                 //   cell.append(event);
                     cell.attr(atts);
                  //  event.fadeIn("normal");
                }
                
            });
        }
    }
    
    var ClearEventsOnCalendar = function() {
        jQuery(".Event", jQuery(ids.container)).remove();
    }
    
    
    jQuery.J.AddEvents = function(eventCollection) {
        if(eventCollection && jQuery.isArray(calendarEvents)) {
            if(jQuery.isArray(eventCollection)) {
                jQuery.each(eventCollection, function() {
                    calendarEvents.push(this);
                });
            } else {
                //add new single event to ed of array
                calendarEvents.push(eventCollection);
            }
            ClearEventsOnCalendar();
            DrawEventsOnCalendar();
        }
    }
    
    jQuery.J.ReplaceEventCollection = function(eventCollection) {
        if(eventCollection) {
            calendarEvents = eventCollection;
        }
    }
    
    jQuery.J.ChangeMonth = function(dateIn) {
        defaults.onMonthChanging(dateIn);
        jQuery.J.DrawCalendar(dateIn);
        defaults.onMonthChanged(dateIn);
        DrawEventsOnCalendar();
        defaults.onMonthChangedFinish(dateIn);
    }
    
    jQuery.J.Initialize = function(options, events) {
        var today = new Date();
        
        options = jQuery.extend(defaults, options);
        jQuery.J.ExtendDate(options);
        
        jQuery.J.DrawCalendar();
        
        if(events)
        {
            calendarEvents = events;
            //Load for the current month
            DrawEventsOnCalendar();
        }
    };
})(jQuery);