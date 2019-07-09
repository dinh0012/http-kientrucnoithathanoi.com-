</div>
</div>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="block-footer">
                    <?php if (has_nav_menu('main_menu_footer')) { ?>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'main_menu_footer',
                            'menu_class' => '',
                            //'menu_id' => 'mmenu',
                            //'container' => 'false',
                            //'items_wrap' => '<div id="%1$s" class="%2$s Header-nav-inner">%3$s</div>',
                            'walker' => new Custom_Walker_Nav_Menu_Footer
                        )); ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="block-footer">
                    <h3>CÔNG TY LEGEND VIỆT NAM</h3>
                    <p>Rất hân hạnh được chào đón quý khách tại văn phòng của chúng tôi tại:</p>
                    <h3>
                        <a href="https://www.google.com/maps?ll=20.965003,105.822572&z=13&t=m&hl=en-US&gl=US&mapclient=embed&cid=10963128162572323256" target="_blank">
                            <strong>ĐỊA  CHỈ: Số 46, tổ 19, P. Khương Trung, Q. Thanh Xuân, TP. Hà Nội</strong>
                        </a>
                    </h3>
					<h3>
                        <a href="https://www.google.com/maps?ll=20.965003,105.822572&z=13&t=m&hl=en-US&gl=US&mapclient=embed&cid=10963128162572323256" target="_blank">
                            <strong>VP: P.712, CT1-A1 Tây Nam Linh Đàm, Q.Hoàng Mai, TP.Hà Nội, Việt Nam</strong>
                        </a>
                    </h3>
					<h3>
                        <a href="https://www.google.com/maps?ll=20.965003,105.822572&z=13&t=m&hl=en-US&gl=US&mapclient=embed&cid=10963128162572323256" target="_blank">
                            <strong>Xưởng sản xuất: Phú Minh, Sóc Sơn, Hà Nội, Việt Nam</strong>
                        </a>
                    </h3>
                    <p style="white-space: pre-wrap;">Email: legendvietnam.co@gmail.com</p>
                    <div class="sqs-block-button-container--left">
                        <a href="tel:0879999188" class="btn-more levi-btn">Hotline : (+84) 879999188</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="block-footer">
                    <p>Xin đừng ngần ngại gửi email về cho chúng tôi bằng cách điền form bên dưới chúng tôi  sẽ phản hồi
                        quý khách hàng trong vòng 24h.</p>
                </div>
                <?php get_sidebar( 'footer-sidebar' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="block-footer">
                    <div class="Footer-nav-group">
                        <a href="https://www.facebook.com/Bugalows" class="Footer-nav-item">Instagram</a>
                        <a href="https://www.facebook.com/Bugalows" target="_blank"
                           class="Footer-nav-item">Facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
