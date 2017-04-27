
    $(document).ready(function(e) {
        function update() {
            var $worked = $(".timeleft");
                var myTime = $worked.html();
            if(myTime != undefined) {
                var ss2 = myTime.split(" days ");
                var ss = ss2[1].split(":");
                var dt = new Date();
                dt.setHours(ss[0]);
                dt.setMinutes(ss[1]);
                dt.setSeconds(ss[2]);
                var dt2 = new Date(dt.valueOf() - 1000);
                var ts = dt2.toTimeString().split(" ")[0];
                if (ts[0] == '0')
                    ts = ts.slice(1, ts.length);
                var temp = ss2[0].concat(" days ").concat(ts);
                $worked.html(temp);
            }
                setTimeout(update, 1000);
        }

        setTimeout(update, 1000);
    });
