    $(document).ready(function(e) {
        function update() {
            $(".timeleft").each(function(i,obj){
                var myTime = obj.innerHTML;
                if(myTime != null) {
                    if(myTime != "0 days 00:00:00") {
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
                        if (temp[0] == '-') {
                            temp = "0 days 00:00:00"
                        }
                        obj.innerHTML = temp;
                    }
                }
            });
            setTimeout(update, 1000);
        }
        setTimeout(update, 1000);
    });
