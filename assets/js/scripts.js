;(function ($) {
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction("frontend/element_ready/Flipclock.default", function (scope, $) {
        var clockElement = $(scope).find(".flipclock");
        var displayType = clockElement.data("display_type");
        var clockFormat = clockElement.data("clock_type");
       
        if(displayType == "clock"){
            clockFace = '12'== clockFormat ? 'TwelveHourClock' : 'TwentyFourHourClock';
            clockElement.FlipClock({
                clockFace: clockFace,
            });
        }else if(displayType == 'timerc'){
           var now = new Date();
           var targetTime = clockElement.data("target_clock_time");
           var targetDateObject = new Date(targetTime);
           var difference = (targetDateObject.getTime() - now.getTime())/1000;
            clockFace = 'HourlyCounter';
            if(difference>24*60*60){
                clockFace = 'DailyCounter';
            }
            var clock = clockElement.FlipClock({
                clockFace: clockFace,
            });
            clock.setTime(difference);
            clock.setCountdown(true);
        }
        else if(displayType == 'generic'){
            clockFace = 'Counter';
            var CountDownValue = clockElement.data("generic_coundown");
            var generic_decrese_mili = clockElement.data("generic_decrese_mili");
            var clock = clockElement.FlipClock(CountDownValue,{
                clockFace: clockFace,
                
            });
            setInterval(function(){
                clock.decrement();
            },generic_decrese_mili)
        }
    });

    })
})(jQuery);