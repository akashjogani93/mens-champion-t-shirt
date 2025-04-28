window.fcBusinessHours = (function () {
    var fcBusinessHours = {
        bh_config: '',
        addJsToHead: function (url) {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.onload = this.checkBusinessHours;
            script.src = url;
            document.getElementsByTagName('head')[0].appendChild(script);
        },
        initBusinessHours: function (config) {
            var _self = this;
            this.bh_config = config;
            var momenturl = 'https://snippets.freshchat.com/js/moment.js';
            setTimeout(function () {
                if (typeof (moment) === "undefined") {
                    console.log("Adding Moment to parent website");
                    _self.addJsToHead(momenturl);
                }
                else {
                    console.log('Moment already defined by parent website');
                    _self.checkBusinessHours();
                }
            }, 20);
        },
        checkBusinessHours: function () {
            var timeFormat = 'HH:mm:ss';
            var momentLang = moment.lang();
            moment.lang('en');
            var day = moment.utc().format('dddd')
            moment.lang(momentLang);
            var time = moment().utc();
            var timeVal = moment().utc().format(timeFormat);
            if (typeof (business_hours_config[day]) !== "undefined") {
                var from = moment(business_hours_config[day].from, ["h:mm A"]);
                var end = moment(business_hours_config[day].to, ["h:mm A"]);
                var fromTime = moment(business_hours_config[day].from, ["h:mm A"]).format(timeFormat);
                var endTime = moment(business_hours_config[day].to, ["h:mm A"]).format(timeFormat);
                var check = moment(timeVal, timeFormat);
                var fr = moment(fromTime, timeFormat);
                var en = moment(endTime, timeFormat);
                if (typeof (check.isBetween) === "undefined") {
                    console.log('Older Version of Moment Detected');
                    if (check.isBefore(en) && check.isAfter(fr) || (check.isSame(fr) || check.isSame(en))) {
                        console.log('Within Business Hours');
                        document.querySelector('.' + window.fcSettings.config.cssNames.widget).style.visibility = 'visible';
                    }
                    else {
                        console.log('Outside Business Hours');
                        document.querySelector('.' + window.fcSettings.config.cssNames.widget).style.visibility = 'hidden';
                    }
                }
                else {
                    console.log('isBetween method on Moment Detected');
                    if (check.isBetween(fr, en) === true) {
                        console.log('Within Business Hours');
                        document.querySelector('.' + window.fcSettings.config.cssNames.widget).style.visibility = 'visible';
                    }
                    else if (moment(moment()).isBetween(from, end) === false) {
                        console.log('Outside Business Hours');
                        document.querySelector('.' + window.fcSettings.config.cssNames.widget).style.visibility = 'hidden';
                    }
                    else {
                        console.log('Else');
                        document.querySelector('.' + window.fcSettings.config.cssNames.widget).style.visibility = 'hidden';
                    }
                }
            }
            else {
                console.log('Business Hours Not Configured for ' + day + ' so widget will be always hidden');
                document.querySelector('.' + window.fcSettings.config.cssNames.widget).style.visibility = 'hidden';
            }
        }
    };
    return fcBusinessHours;
}());