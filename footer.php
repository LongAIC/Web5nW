  	<!-- Đăng Ký -->
  	<section class="dk_lienhe">
  		<div class="container">
  			<div class="flex-center">
  				<div class="tt_footer">
  					<?php if (get_field('tieu_de_form', 'option')) : ?>
  						<h2><?php echo get_field('tieu_de_form', 'option'); ?></h2>
  					<?php endif; ?>
  				</div>
  				<div class="wrap-w">
  					<div class="form-dk">
  						<?php if (get_field('them_form_dk', 'option')) : ?>
  							<?php echo get_field('them_form_dk', 'option'); ?>
  						<?php endif; ?>

  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
  	<!-- Our member -->

  	<?php $bg_member = get_field('bg_member', 'option'); ?>
  	<section class="member-content padding-20" style="background: url(<?php echo $bg_member['url']; ?>) fixed center center no-repeat;background-size: cover;">
  		<div class="container">
  			<?php $title_doitac = get_field('title_doitac', 'option'); ?>
  			<?php if ($title_doitac) : ?>
  				<h2 class="title_sec title-none"><?php echo $title_doitac; ?></h2>
  			<?php endif; ?>
  			<div class="row">
  				<div class="swiper-container">
  					<div class="swiper-wrapper">
  						<?php
							while (have_rows('list_doitac', 'option')) : the_row();
								$logo_doitac = get_sub_field('logo_doitac');
								$link_doitac = get_sub_field('link_doitac');
							?>
  							<div class=" swiper-slide ">
  								<div class="content member">
  									<div class="item">
  										<div class="content-thumb">
  											<?php if ($link_doitac) : ?>
  												<a href="<?php echo $link_doitac; ?>">
  												<?php endif; ?>
  												<img src="<?php echo $logo_doitac['url']; ?>" alt="<?php echo $logo_doitac['alt'] ?>" />
  												<?php if ($link_doitac) : ?>
  												</a>
  											<?php endif; ?>
  										</div>
  									</div>
  								</div>
  							</div>
  						<?php endwhile; ?>
  					</div>
  					<div class="pagenv fixfloat">
  						<div class="swiper-btn-prev swiper-btn"><i class="fa fa-angle-left"></i></div>
  						<div class="swiper-btn-next swiper-btn"><i class="fa fa-angle-right"></i></div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
  	<!-- .End our member -->
  	<footer class="footer" itemscope="" itemtype="http://schema.org/WPFooter">

  		<div class="container">
  			<div class="footer_wrap">
  				<div class="row">
  					<div class="widgetscontainer">
  						<!-- Widget Area 1 -->
  						<div class="col-xs-12 col-sm-12 col-md-5">
  							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1')) : ?><?php endif; ?>
  						</div>
  						<!-- Widget Area 1 -->
  						<div class="col-xs-12 col-sm-6 col-md-5">
  							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2')) : ?><?php endif; ?>
  						</div>
  						<!-- Widget Area 2 -->
  						<div class="col-xs-12 col-sm-6 col-md-2">
  							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3')) : ?><?php endif; ?>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  		<?php
			$copyright_text = get_field('copyright_text', 'option');
			if ($copyright_text) :
			?>
  			<div class="bg-color footer-copyright fixed-padding">
  				<div class="container">
  					<div class="row">
  						<div class="col-xs-12">
  							<div class="copyright-section">
  								<p><?php echo $copyright_text; ?></p>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		<?php endif; ?>
  	</footer>
  	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  	<script>
  		$(document).ready(function() {
  			$('.adc').click(function() { // Khi click vào button thì sẽ gọi hàm ajax
  				var data = $('.search-ajax').val(); // get dữ liệu khi đang nhập từ khóa vào ô
  				console.log(data);
  				$.ajax({
  					type: 'POST',
  					async: true,
  					url: '<?php echo admin_url('admin-ajax.php'); ?>',
  					data: {
  						'action': 'giaodien_filter',
  						'data': data
  					},
  					beforeSend: function() {
  						// Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
  					},
  					success: function(data) {
  						//Làm gì đó khi dữ liệu đã được xử lý
  						$('.stage-filter').html(data); // Đổ dữ liệu trả về vào thẻ &lt;div class="display-post"&gt;&lt;/div&gt;
  					},
  					error: function(jqXHR, textStatus, errorThrown) {
  						//Làm gì đó khi có lỗi xảy ra
  						console.log('The following error occured: ' + textStatus, errorThrown);
  					}
  				});

  			});
  		});
  	</script>
  	<script>
  		$(document).ready(function() {
  			var total = 0;
  			$(".check-total-service input:checkbox").change(function() {

  				var value = $(this).val(); // this gives me null
  				var so = value.replaceAll(',', '');
  				var result = Number(so);

  				var dataId = $(".total_prices").attr("data-value");
  				console.log(dataId);
  				var replace_total = dataId.replaceAll(',', '');
  				var result_int = Number(replace_total);

  				console.log(so);
  				if (this.checked) {
  					total += result;

  				} else {
  					total -= result;
  					console.log(total);
  				}
  				if (total == 0) {
  					$('#tuychon').hide();
  				} else {
  					$('#tuychon').css("display", "flex");
  				}

  				console.log(total);

  				var total_prices = total + result_int;

  				var String_total = String(total);
  				var String_Price_total = String(total_prices);

  				let charArr = String_total.split('');
  				let charTotal = String_Price_total.split('');

  				console.log(charArr);

  				var dodai = charArr.length;

  				if (dodai == 6) {
  					charArr.splice(3, 0, ',');
  					let arr = charArr.join('');
  					let Text = arr.toString();

  					$('#prices_tuychon').text(Text + "VNĐ");
  				}
  				if (dodai == 7) {
  					charArr.splice(1, 0, ',');
  					charArr.splice(5, 0, ',');
  					let arr = charArr.join('');
  					let Text = arr.toString();

  					$('#prices_tuychon').text(Text + "VNĐ");
  				}

  				$("#tonggia").empty();
  				var dodaix = String_Price_total.length;
  				if (dodaix == 6) {
  					charTotal.splice(3, 0, ',');
  					let arr = charTotal.join('');
  					let Text = arr.toString();

  					$('#tonggia').text(Text + "VNĐ");
  				}
  				if (dodaix == 7) {
  					charTotal.splice(1, 0, ',');
  					charTotal.splice(5, 0, ',');
  					let arr = charTotal.join('');
  					let Text = arr.toString();

  					$('#tonggia').text(Text + "VNĐ");
  				}

  			});
  		});
  	</script>
  	<!-- <script>
  		$('.check-total-service input[type=checkbox]').change(function() {

  			var value = $(this).val(); // this gives me null
  			var so = +value.replaceAll(',', '');
  			var total = 0;
  			if (this.checked) {
  				total += so;

  			} else {
  				total -= so;
  			}
  			$('#tuychon').css("display", "flex");
  			var String_total = String(total);
  			let charArr = String_total.split('');
  			var dodai = charArr.length;
  			if (dodai == 6) {
  				charArr.splice(3, 0, ',');
  				let arr = charArr.join('');
  				let Text = arr.toString();

  				$('#prices_tuychon').text(Text + "VNĐ");
  			}
  			if (dodai == 7) {
  				charArr.splice(1, 0, ',');
  				charArr.splice(, 0, ',');
  				let arr = charArr.join('');
  				let Text = arr.toString();

  				$('#prices_tuychon').text(Text + "VNĐ");
  			}


  		});
  	</script> -->
  	<?php wp_footer(); ?>
  	</body>

  	</html>