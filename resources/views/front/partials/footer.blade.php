<!--====== Start Footer ======-->
<footer class="saas-footer">
    @if ($bs->top_footer_section == 1)
    <section class="saas-analysis footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="{{ asset('assets/front/img/home/footer/logo.png') }}" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul>
                        <li><a href="/">Home</a></li> 
                        <li><a href="/contact/">Contact Us</a></li>
                        <li><a href="/pricing/">Pricing</a></li> 
                        <li><a href="/blogs/">Blog</a></li>
                    </ul>
                <div>
                <h4 class="copyright">All Rights Reserved @itsfolio.com</h4>
            </div>

            <div class="row text-center"> 
                <div class="col-md-12">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=1000950162169490" target="_black"><img src="{{ asset('assets/front/img/home/footer/facebook.png') }}" class="img-fluid"></a>
                        </li>
                        <li>
                            <a href="https://instagram.com/itsfolio?igshid=MzRlODBiNWFlZA==" target="_black"><img src="{{ asset('assets/front/img/home/footer/instagram.png') }}" class="img-fluid"></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/itsfolio/" target="_black"> <img src="{{ asset('assets/front/img/home/footer/linkedin.png') }}" class="img-fluid"></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/itsfolio" target="_black"> <img src="{{ asset('assets/front/img/home/footer/twitter.png') }}" class="img-fluid"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endif
</footer><!--====== End Footer ======-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var words = [
        "Entrepreneur",
        "Freelancers",
        "Professionals",
        "Experts",
        "Freshers"
    ],
    part,
    i = 0,
    offset = 0,
    len = words.length,
    forwards = true,
    skip_count = 0,
    skip_delay = 25,
    speed = 120;
    var wordflick = function () {
        setInterval(function () {
            if (forwards) {
                if (offset >= words[i].length) {
                    ++skip_count;
                    if (skip_count == skip_delay) {
                    forwards = false;
                    skip_count = 0;
                    }
                }
            } else {
                if (offset == 0) {
                    forwards = true;
                    i++;
                    offset = 0;
                    if (i >= len) {
                    i = 0;
                    }
                }
            }
            part = words[i].substr(0, offset);
            if (skip_count == 0) {
                if (forwards) {
                    offset++;
                } else {
                    offset--;
                }
            }
            $(".word").text(part);
            }, speed);
        };

        $(document).ready(function () {
            wordflick();
        });
    </script>
