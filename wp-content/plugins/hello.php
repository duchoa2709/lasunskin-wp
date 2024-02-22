<?php
/**
 * @package Hello_Dolly
 * @version 1.7.2
 */
/*
Plugin Name: Hello Dolly
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.7.2
Author URI: http://ma.tt/
*/

function hello_dolly_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "Em như là đại dương xanh ngắt khiến bao người ao ước Còn anh là đám lá khô rơi lặng yên Ánh nắng đến vây quanh em Còn nơi anh tàn tro quấn lấy
	Anh như vì ngàn sao biến mất khi huy hoàng
	Còn em là bình minh đem theo trong tim muôn vàn rạng rỡ
	Ta vốn không thuộc về nhau , sinh ra đã là thứ đối lập nhau
	Như nam châm ta có hai cực hút
	Nhưng sẽ đẩy nhau nếu quay đầu ngược hướng
	Như bóng đêm đôi chân sẽ bước lạc nhưng chợt nhận ra khi mặt trời dẫn đường
	Rồi sẽ bùng cháy như những đám tro tàn hay lại hồi sinh theo từng giọt mưa rơi
	Như kẻ mộng du với vương quốc mơ màng rồi chợt tỉnh giấc khi bình minh vừa tới
	Như tương lai em gạt đi, anh vội tô màu xanh cho quá khứ
	Giữa sa mạc khô nhưng vòng tay anh lạnh căm như đóng băng một nửa
	Chơ vơ anh đứng giữa bóng đêm
	Để chờ thấy chút ánh sáng em còn lại
	Nhưng mà đâu thấy
	Ngôi sao trên cao lấp lánh
	Ánh lên ngàn hy vọng rồi lại vụt biến mất
	Chẳng có định nghĩa nào là đúng nhất
	Hành tinh vẫn cứ xoay thôi
	Không thể khiến ngày chạm vào đêm đen tối
	Cũng như không cách nào để hai ta chung lối
	Vạn vật sẽ biến tan cùng em
	Anh lang thang với trái tim ngủ yên
	Em như là đại dương xanh ngắt khiến bao người ao ước
	Còn anh là đám lá khô rơi lặng yên
	Ánh nắng đến vây quanh em
	Còn nơi anh tàn tro quấn lấy
	Anh như ngàn vì sao biến mất khi huy hoàng
	Còn em là bình minh đem theo trong tim muôn vàn rạng rỡ
	Ta vốn không thuộc về nhau, sinh ra đã là thứ đối lập nhau
	Bỏ lại quá khứ
	Nhìn về tương lai
	Hành trang ta có sẽ mang theo suốt đời
	Cùng tình yêu kia dù gặp lại nhau cũng chẳng thể nói
	Em như là đại dương xanh ngắt khiến bao người ao ước
	Còn anh là đám lá khô rơi lặng yên
	Ánh nắng đến vây quanh em
	Còn nơi anh tàn tro quấn lấy
	Anh như ngàn vì sao biến mất khi huy hoàng
	Còn em là bình minh đem theo trong tim muôn vàn rạng rỡ
	Ta vốn không thuộc về nhau, sinh ra đã là thứ đối lập nhau
	Chẳng đặt tên cho nỗi đau
	Nụ cười in dấu tháng ngày ta đã đánh mất phía sau
	Ánh nắng che mờ giông tố, ngăn cơn mưa trong em ngừng rơi
	Hãy bước tiếp tới bình yên khác
	Em sẽ cất giấu trong tim, hãy quên nhau đi ta vốn đã không thuộc về nhau";

	// Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hello_dolly() {
	$chosen = hello_dolly_get_lyric();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="dolly"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Hello Dolly song, by Jerry Herman:' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph.
function dolly_css() {
	echo "
	<style type='text/css'>
	#dolly {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #dolly {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#dolly,
		.rtl #dolly {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );
