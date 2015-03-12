<?php
/**
 * Copyright (c) 2015 Intelliant
 *
 * Product fuzzy search module
 * 
 * The MIT License (MIT)
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 *  @author Intelliant (open.ant@intelliant.net)
 */

	/**
     * @see Testimonial::index();
     * @var $testimonial
     * @var $title
     */
?>
<html>
<head>
    <title><?php echo $title ?></title>

<style>
section {
    margin: 20px auto 0;
    width: 83.33%;
}
.testimonial_text {
    float: left;
    height: auto;
    margin-right: 5%;
    margin-top: 0;
    width: 55%;
}
p {
    color: #7b7c7c;
    font-family: sans-serif;
    font-size: 16px;
}
.testimonial_video {
    float: right;
    height: auto;
    overflow: hidden;
    width: 40%;
}
</style>
</head>
<body>
<div id="main" role="main" class="main  clearfix">
    <article>
        <section class="inner">
            <h2>Testimonials</h2>
            <p class="testimonial_text">
                <?php
                foreach($testimonial as $ts)
                {
                    if ($ts['type'] == 'text')
                    {
                        echo $ts['content'] . '<br>';
                        echo 'By: <strong>'.$ts['firstname'].' '.$ts['lastname'];
                        if($ts['city'] != '')
                            echo ', '.$ts['city'];
                        echo '</strong><br><br>';
                    }
                }
                ?>
            </p>
            <div class="testimonial_video">
                <?php foreach($testimonial as $ts)
                {
                    if ($ts['type'] == 'video')
                    {
                        echo '<div><iframe src="';
                        echo $ts['content'] . '" allowfullscreen="" frameborder="0" height="250" width="320"></iframe><br><br></div>';
                    }
                }
                ?>
			</div>
        </section>
    </article>
</div>
</body>
</html>