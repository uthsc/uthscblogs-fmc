</div><!-- Row End -->
</div><!-- Container End -->

<div id="sticky-footer-root-footer"></div>
</div><!-- Sticky Footer Root End -->

<div id="sticky-footer">
        <div class="uthsc-footer-top full-width">
            <div class="row" data-equalizer>
                <?php dynamic_sidebar("Footer"); ?>
            </div>
        </div>

        <!--Bottom Footer-->
        <div class="uthsc-footer-bottom full-width">
            <div class="row collapse">
                <div class="columns text-center">
                    <br/>

                    <div class="row">
                        <div class="columns medium-6 small-text-center medium-text-right">
                            <h3>&copy; <?php echo date("Y") ?> Family Medicine Center</h3>
                            <p>294 Summar Drive<br />
                                Jackson, TN 38301<br />
                                Phone: (731) 423-1932<br />
                                (800) 640-7589</p>
                            <h3>Hours:</h3>
                                <p>Monday 8am-9pm<br />
                                Tuesday-Friday: 8am-5pm</p>

                                <a href="https://fpcportal.uthsc.edu/" class="button secondary radius small"><span class="fa fa-clock-o"></span> Schedule an Appointment</a>
                        </div>
                        <div class="columns medium-6 left">
                            <a href="https://goo.gl/maps/8J6oFY13WN92">
                                <img style="padding: 0;float: left;" class="th" src="https://maps.googleapis.com/maps/api/staticmap?center=35.6383834,-88.8330000&zoom=17&format=png&sensor=false&size=340x340&maptype=roadmap&style=feature:poi.medical|element:geometry|visibility:on|hue:0x006a4d">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php wp_footer(); ?>

</div>
<script src="/wp-content/themes/uthscblogs/js/app.min.js"></script>
</body>
</html>