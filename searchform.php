<ul class="right">

    <li class="has-form has-form-search">
        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>"
              xmlns="http://www.w3.org/1999/html">
            <div class="row collapse">


            <div class="large-8 small-9 columns">
                <input type="text" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'reverie'); ?>">
            </div>
            <div class="large-4 small-3 columns">

                <input type="submit" id="searchsubmit" value="&#xf002;" class="button postfix fa">
            </div>

        </div>
        </form>
    </li>

</ul>
