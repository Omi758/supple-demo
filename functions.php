<?php
/**
 * アイキャッチ画像を有効にする
 */
add_theme_support("post-thumbnails");


/**
* Google fonts・CSS・JS ファイル読み込み
*/
function supple_enqueue_scripts() {
// Google Fonts の読み込み
wp_enqueue_style(
"google-web-fonts",
"https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Noto+Sans+JP&display=swap",
array(),
null
);

// CSSの読み込み
wp_enqueue_style(
"supple-style",
get_template_directory_uri() . "/assets/css/style.css",
array("google-web-fonts"), // Google Fontsに依存
"1.0.0"
);

// JS読み込み
wp_enqueue_script(
"supple-main",
get_template_directory_uri() . "/assets/js/main.js",
array(),
"1.0.0",
true // フッターで読み込む
);
}

add_action("wp_enqueue_scripts", "supple_enqueue_scripts");


/**
* Category Order and Taxonomy Terms Order
*/
// カスタム投稿タイプにメニューオーダー機能を追加
function add_menu_order_to_menu_post_type() {
add_post_type_support("menu", "page-attributes");
}
add_action("init", "add_menu_order_to_menu_post_type");

// Category Order and Taxonomy Terms Order プラグイン対応
// タクソノミーの順序をフロントエンドに反映させる
function apply_taxonomy_order_to_frontend($args, $taxonomies) {
// coffeeタクソノミーの場合のみ適用
if (in_array("coffee", $taxonomies)) {
$args[ "orderby" ] = "term_order"; // プラグインが管理する順序
$args[ "order" ] = "ASC"; // 昇順
}
return $args;
}
// 10: 優先度（数字が小さいほど早く実行）
// 2: 関数が受け取る引数の数
add_filter("get_terms_args", "apply_taxonomy_order_to_frontend", 10, 2);


/**
* shoplist検索_エリア検索を有効にする
*/
function shoplist_search_filter_basic( $query ) {
// 管理画面でない && メインクエリ && 検索ページ
if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {

//post_typeがshoplistの場合のみ処理
if ( isset($_GET['post_type']) && $_GET['post_type'] === 'shoplist' ) {

// カスタム投稿タイプを指定
$query->set( 'post_type', 'shoplist' );

// エリアパラメータが存在する場合
if ( isset($_GET['area']) && !empty($_GET['area']) ) {
$query->set( 'meta_query', array(
array(
'key' => 'area',
'value' => sanitize_text_field($_GET['area']),
'compare' => '='
)
));
}
}
}
}
add_action( 'pre_get_posts', 'shoplist_search_filter_basic' );

/**
 * MENU/SHOPLISTページの下層ページにアクセスしたら一覧にリダイレクト
 */
function redirect_custom_post_type() {
	if ( is_singular( 'menu' ) ) {
		wp_redirect( home_url( '/menu' ), 301 );
		exit;
	}
	if ( is_singular( 'shoplist' ) ) {
		wp_redirect( home_url( '/shoplist' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'redirect_custom_post_type' );

/**
* ブロックエディタにCSSを適用する
*/
function my_editor_support()
{
add_theme_support("editor-styles");
add_editor_style("assets/css/editor-style.css");
}
add_action("after_setup_theme", "my_editor_support");


/**
 * メニュー機能を有効にする
 */

 function supple_setup() {
  // メニュー機能を有効化
add_theme_support("menus");
// ナビゲーションメニューを登録
register_nav_menus(array(
  "header" => "ヘッダー",
));
}
add_action("after_setup_theme", "supple_setup");


/**
 * ヘッダーメニュー用のカスタムウォーカー
 * 既存のCSSクラス名（.header-item, .header-link）を使用
 *  Walker_Nav_Menu = WordPressが用意している「メニュー用の基本クラス」
 * これを継承（extends）して、独自の出力方法を作る
 * 
 * 但し、CSSで既存のheader-item,header-linkの設定を残したまま
 * クラス名に『.header-nav .menu-item{}』を指定すれば直るので、このカスタムウォーカーは不要
 */
class Custom_Header_Walker extends Walker_Nav_Menu {
    
    // リスト項目の開始
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<li class="header-item">';
        
        // リンクの属性を設定
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        // リンクタグを出力
        $output .= '<a class="header-link"' . $attributes . '>';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
    }
    
    // リスト項目の終了
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }
}

/**
 * XML-Sitemap 日付アーカイブページを外す
 *  */
function remove_date_archives_from_xml_output() {
    // サイトマップリクエストかチェック
    if (strpos($_SERVER['REQUEST_URI'], 'sitemap') !== false && 
        strpos($_SERVER['REQUEST_URI'], '.xml') !== false) {
        
        ob_start(function($buffer) {
            // 年/月形式の日付アーカイブエントリを削除
            // 例: /2024/03/, /2023/08/ など
            $pattern = '/<url>\s*<loc>[^<]*\/\d{4}\/\d{2}\/\s*<\/loc>.*?<\/url>/s';
            $buffer = preg_replace($pattern, '', $buffer);
            
            // 年のみの形式も削除（もしあれば）
            // 例: /2024/, /2023/ など  
            $pattern_year = '/<url>\s*<loc>[^<]*\/\d{4}\/\s*<\/loc>.*?<\/url>/s';
            $buffer = preg_replace($pattern_year, '', $buffer);
            
            // 空行を削除してXMLを整形
            $buffer = preg_replace('/\n\s*\n/', "\n", $buffer);
            
            return $buffer;
        });
    }
}
add_action('template_redirect', 'remove_date_archives_from_xml_output', 1);

// より確実にするため、WordPressのinitフックでも実行
function force_remove_date_archives() {
    if (isset($_GET['sitemap']) || strpos($_SERVER['REQUEST_URI'], 'sitemap') !== false) {
        remove_date_archives_from_xml_output();
    }
}
add_action('init', 'force_remove_date_archives', 1);


/**
 * セキュリティ対策
 * 参考記事：https://baigie.me/officialblog/2020/01/28/wordpress-security/
 */
remove_action( 'wp_head', 'wp_generator' ); // WordPressのバージョン
remove_action( 'wp_head', 'wp_shortlink_wp_head' ); // 短縮URLのlink
remove_action( 'wp_head', 'wlwmanifest_link' ); // ブログエディターのマニフェストファイル
remove_action( 'wp_head', 'rsd_link' ); // 外部から編集するためのAPI
remove_action( 'wp_head', 'feed_links_extra', 3 ); // フィードへのリンク
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // 絵文字に関するJavaScript
remove_action( 'wp_head', 'rel_canonical' ); // カノニカル
remove_action( 'wp_print_styles', 'print_emoji_styles' ); // 絵文字に関するCSS
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); // 絵文字に関するJavaScript
remove_action( 'admin_print_styles', 'print_emoji_styles' ); // 絵文字に関するCSS