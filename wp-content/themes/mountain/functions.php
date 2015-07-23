<?php 
//Инициализация темы, подключение css
function name_enqueue_styles() {
    wp_enqueue_style( 'name-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'name-style', get_stylesheet_uri(), array( 'name-parent-style' ) );
	wp_enqueue_style( 'colorbox_style', get_stylesheet_directory_uri() . '/css/colorbox.css' );
}
    add_action( 'wp_enqueue_scripts', 'name_enqueue_styles' );
	
	function name_dequeue_styles() {
       
    wp_dequeue_style( 'parent-style' );
       
}
    add_action( 'wp_print_styles', 'name_dequeue_styles' );
	
//Подключение jquery в хедер
    function getScript(){
	wp_deregister_script('jquery');
    wp_enqueue_script('colorbox_script_min', get_stylesheet_directory_uri() . '/js/colorbox/jquery.min.js');
    wp_enqueue_script('colorbox', get_stylesheet_directory_uri() . '/js/colorbox/jquery.colorbox.js');
    //wp_enqueue_script('colorbox_script', get_stylesheet_directory_uri() . '/js/colorbox/colorbox_script.js');
   
   
    }
    add_action( 'wp_enqueue_scripts', 'getScript' );
	
	function getScriptInHeader(){
    wp_enqueue_script('colorbox_script_in_header', get_stylesheet_directory_uri() . '/js/colorbox/colorbox_script.js');
   
   
    }

//Пользовательские поля в админке 
    function my_meta_box() {  
    add_meta_box(  
        'my_meta_box', // Идентификатор(id)
        'Заголовок', // Заголовок области с мета-полями(title)
        'show_my_metabox', // Вызов(callback)
        'page', // Где будет отображаться наше поле, в нашем случае в Записях
        'normal',
        'high');
}  
    add_action('add_meta_boxes', 'my_meta_box'); // Запускаем функцию
 
    $meta_fields = array(  
     array(  
        'label' => 'Большое текстовое поле',  
        'desc'  => 'Описание для поля.',  
        'id'    => 'mytextarea',  // даем идентификатор.
        'type'  => 'textarea'  // Указываем тип поля.
    ),   
);
 
// Вызов метаполей  
    function show_my_metabox() {  
    global $meta_fields; // Обозначим наш массив с полями глобальным
    global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста
    // Выводим скрытый input, для верификации. Безопасность прежде всего!
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
 
    // Начинаем выводить таблицу с полями через цикл
    echo '<table class="form-table">';  
    foreach ($meta_fields as $field) {  
        // Получаем значение если оно есть для этого поля
        $meta = get_post_meta($post->ID, $field['id'], true);  
        // Начинаем выводить таблицу
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';  
                switch($field['type']) {  
    case 'textarea':  
    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
        <br /><span class="description">'.$field['desc'].'</span>';  
    break; 
                }
        echo '</td></tr>';  
    }  
    echo '</table>';
}

// Пишем функцию для сохранения
    function save_my_meta_fields($post_id) {  
    global $meta_fields;  // Массив с нашими полями
 
    // проверяем наш проверочный код
    //if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))  
        return $post_id;  
    // Проверяем авто-сохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;  
    // Проверяем права доступа  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
 
    // Если все отлично, прогоняем массив через foreach
    foreach ($meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true); // Получаем старые данные (если они есть), для сверки
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  // Если данные новые
            update_post_meta($post_id, $field['id'], $new); // Обновляем данные
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old); // Если данных нету, удаляем мету.
        }  
    } // end foreach  
}  
    add_action('save_post', 'save_my_meta_fields'); // Запускаем функцию сохранения

//Вывод пользовательских полей в тему шаблона
    function showinHeader(){
	$meta = get_post_meta( get_the_ID() );
		if(is_array($meta ) && array_key_exists('mytextarea', $meta)) {
			echo $meta['mytextarea'][0];
	}
}
//add_action('wp_head','showinHeader');

   function showSidebar(){
   unregister_sidebar( 'sidebar-1' );

   add_action( 'after_setup_theme', 'theme_setup' );
		register_sidebar(array('name'=>__('Language','mountaincreek'),
	    'id'            => 'languagesidebar',
		'before_widget' => '<div class="hot-news rounds">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
}
    add_action( 'widgets_init', 'showSidebar' );

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>