<?php

class MailsterForms {

	private $request = null;

	public function __construct() {

		add_action( 'plugins_loaded', array( &$this, 'init' ) );

	}


	public function init() {

		add_action( 'admin_menu', array( &$this, 'admin_menu' ), 20 );

		if ( is_admin() ) {

		} else {

			add_action( 'mailster_form_header', array( &$this, 'set_form_request' ) );
			add_action( 'mailster_form_head', array( &$this, 'form_head' ) );
			add_action( 'mailster_form_body', array( &$this, 'form_body' ) );
			add_action( 'mailster_form_footer', array( &$this, 'form_footer' ) );

		}

	}


	public function set_form_request() {

		global $pagenow;

		$formpage = $pagenow == 'form.php';

		$this->request = array(
			'is_editable' => isset( $_GET['edit'] ) && wp_verify_nonce( $_GET['edit'], 'mailsteriframeform' ),
			'is_embeded' => $formpage && ! isset( $_GET['iframe'] ),
			'is_button' => isset( $_GET['button'] ),
			'is_iframe' => $formpage && ( isset( $_GET['iframe'] ) && $_GET['iframe'] == 1 && ! isset( $_GET['button'] ) ),
			'use_style' => ( ( isset( $_GET['style'] ) && $_GET['style'] == 1 ) || ( isset( $_GET['s'] ) && $_GET['s'] == 1 ) ),
			'form_id' => ( isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 1 ),
			'showcount' => ( isset( $_GET['showcount'] ) ? intval( $_GET['showcount'] ) : 0 ),
			'width' => ( isset( $_GET['width'] ) ? $_GET['width'] : 480 ),
			'buttonstyle' => ( isset( $_GET['design'] ) ? $_GET['design'] : 'default' ),
			'button_id' => ( isset( $_GET['button'] ) ? intval( $_GET['button'] ) : '' ),
			'origin' => ( isset( $_GET['origin'] ) ? $_GET['origin'] : '' ),
			'buttonlabel' => ( isset( $_GET['label'] ) ? esc_attr( strip_tags( urldecode( $_GET['label'] ) ) ) : 'Subscribe' ),

		);
	}


	public function form_head() {

		extract( $this->request );

		$suffix = SCRIPT_DEBUG ? '' : '.min';

		wp_register_style( 'mailster-form-default-style', MAILSTER_URI . 'assets/css/form-default-style' . $suffix . '.css', array(), MAILSTER_VERSION );

		if ( $use_style ) {
			wp_register_style( 'mailster-theme-style', get_template_directory_uri() . '/style.css', array(), MAILSTER_VERSION );
			wp_print_styles( 'mailster-theme-style' );
		}
		if ( $is_button ) {

			do_action( 'mailster_form_head_button' );
			do_action( 'mymail_form_head_button' );
			$buttonstyle = explode( ' ', $buttonstyle );

			wp_register_style( 'mailster-form-button-base-style', MAILSTER_URI . 'assets/css/button-style' . $suffix . '.css', array(), MAILSTER_VERSION );
			wp_register_style( 'mailster-form-button-style', MAILSTER_URI . 'assets/css/button-' . $buttonstyle[0] . '-style' . $suffix . '.css', array( 'mailster-form-button-base-style' ), MAILSTER_VERSION );
			// wp_print_styles('form-button-style');
			mailster( 'helper' )->wp_print_embedded_styles( 'mailster-form-button-style' );

		} elseif ( $is_editable ) {

			wp_print_styles( 'mailster-form-default-style' );

		} elseif ( $is_embeded ) {

			do_action( 'mailster_form_head_embeded' );
			do_action( 'mymail_form_head_embeded' );
			wp_print_styles( 'mailster-form-default-style' );

		} elseif ( $is_iframe ) {

			do_action( 'mailster_form_head_iframe' );
			do_action( 'mymail_form_head_iframe' );
			wp_register_style( 'mailster-form-iframe-style', MAILSTER_URI . 'assets/css/form-iframe-style' . $suffix . '.css', array( 'mailster-form-default-style' ), MAILSTER_VERSION );
			mailster( 'helper' )->wp_print_embedded_styles( 'mailster-form-iframe-style' );
			$width = preg_match( '#\d+%#', $width ) ? intval( $width ) . '%' : intval( $width ) . 'px';
			echo '<style type="text/css">.mailster-form-wrap{width:' . $width . '}</style>';

		} else {

			// wp_register_style('mailster-form', MAILSTER_URI . 'assets/css/form'.$suffix.'.css', array(), MAILSTER_VERSION);
			// wp_print_styles('mailster-form');
		}

	}


	public function form_body() {

		extract( $this->request );

		if ( $is_button ) {

			do_action( 'mailster_form_body_button' );
			do_action( 'mymail_form_body_button' );
			include MAILSTER_DIR . 'views/forms/button.php';

		} elseif ( $is_iframe ) {

			do_action( 'mailster_form_body_iframe' );
			do_action( 'mymail_form_body_iframe' );
			$form = mailster( 'form' )->id( $form_id );
			$form->add_class( 'in-iframe' );
			$form->render();

		} elseif ( $is_editable ) {

			$form = mailster( 'form' )->id( $form_id );
			$form->add_class( 'embeded' );
			$form->prefill( false );
			$form->set_success( __( 'This is a success info', 'mailster' ) );
			$form->set_error( __( 'This is an error message', 'mailster' ) );
			$form->is_preview();
			$form->render();

		} else {

			$form = mailster( 'form' )->id( $form_id );
			$form->add_class( 'embeded' );
			$form->render();

		}

	}


	public function form_footer() {

		extract( $this->request );

		$suffix = SCRIPT_DEBUG ? '' : '.min';

		wp_register_script( 'mailster-form', MAILSTER_URI . 'assets/js/form' . $suffix . '.js', array( 'jquery' ), MAILSTER_VERSION );

		if ( $is_button ) {

			do_action( 'mailster_form_footer_button' );
			do_action( 'mymail_form_footer_button' );
			wp_register_script( 'mailster-form-button-script', MAILSTER_URI . 'assets/js/form-button-script' . $suffix . '.js', array(), MAILSTER_VERSION );
			// wp_localize_script( 'mailster-form-button-script', 'MailsterData', $mailsterData);
			mailster( 'helper' )->wp_print_embedded_scripts( 'mailster-form-button-script' );
			// wp_print_scripts('mailster-form-button-script');
		} elseif ( $is_editable ) {

			wp_register_script( 'mailster-editable-form', MAILSTER_URI . 'assets/js/editable-form-script' . $suffix . '.js', array( 'jquery' ), MAILSTER_VERSION );
			wp_print_scripts( 'mailster-editable-form' );

		} elseif ( $is_embeded ) {

			do_action( 'mailster_form_footer_embeded' );
			do_action( 'mymail_form_footer_embeded' );
			wp_print_scripts( 'mailster-form' );

		} elseif ( $is_iframe ) {

			do_action( 'mailster_form_footer_iframe' );
			do_action( 'mymail_form_footer_iframe' );
			wp_register_script( 'mailster-form-iframe-script', MAILSTER_URI . 'assets/js/form-iframe-script' . $suffix . '.js', array( 'jquery' ), MAILSTER_VERSION );
			// wp_localize_script('mailster-form-iframe-script', 'MailsterData', $mailsterData);
			wp_print_scripts( 'mailster-form-iframe-script' );
			wp_print_scripts( 'mailster-form' );

		} else {

			// wp_print_scripts('mailster-form-embeded');
		}

	}


	public function admin_menu() {

		$page = add_submenu_page( 'edit.php?post_type=newsletter', __( 'Forms', 'mailster' ), __( 'Forms', 'mailster' ), 'mailster_edit_forms', 'mailster_forms', array( &$this, 'view_forms' ) );

		add_action( 'load-' . $page, array( &$this, 'script_styles' ) );

		if ( isset( $_GET['ID'] ) || isset( $_GET['new'] ) ) :

			add_action( 'load-' . $page, array( &$this, 'edit_entry' ), 99 );

		else :

			add_action( 'load-' . $page, array( &$this, 'bulk_actions' ), 99 );
			add_action( 'load-' . $page, array( &$this, 'screen_options' ) );
			add_filter( 'manage_' . $page . '_columns', array( &$this, 'get_columns' ) );

		endif;

	}


	public function script_styles() {

		$suffix = SCRIPT_DEBUG ? '' : '.min';

		if ( isset( $_GET['ID'] ) || isset( $_GET['new'] ) ) :

			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'jquery-touch-punch' );

			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );

			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'thickbox' );

			wp_enqueue_style( 'form-button-style', MAILSTER_URI . 'assets/css/button-style' . $suffix . '.css', array(), MAILSTER_VERSION );

			wp_enqueue_style( 'form-button-default-style', MAILSTER_URI . 'assets/css/button-default-style' . $suffix . '.css', array( 'form-button-style' ), MAILSTER_VERSION );
			wp_enqueue_style( 'form-button-wp-style', MAILSTER_URI . 'assets/css/button-wp-style' . $suffix . '.css', array( 'form-button-style' ), MAILSTER_VERSION );
			wp_enqueue_style( 'form-button-twitter-style', MAILSTER_URI . 'assets/css/button-twitter-style' . $suffix . '.css', array( 'form-button-style' ), MAILSTER_VERSION );
			wp_enqueue_style( 'form-button-flat-style', MAILSTER_URI . 'assets/css/button-flat-style' . $suffix . '.css', array( 'form-button-style' ), MAILSTER_VERSION );
			wp_enqueue_style( 'form-button-minimal-style', MAILSTER_URI . 'assets/css/button-minimal-style' . $suffix . '.css', array( 'form-button-style' ), MAILSTER_VERSION );

			wp_enqueue_style( 'jquery-ui-style', MAILSTER_URI . 'assets/css/libs/jquery-ui' . $suffix . '.css', array(), MAILSTER_VERSION );
			wp_enqueue_style( 'jquery-datepicker', MAILSTER_URI . 'assets/css/datepicker' . $suffix . '.css', array(), MAILSTER_VERSION );

			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-ui-datepicker' );

			wp_enqueue_script( 'mailster-form-detail', MAILSTER_URI . 'assets/js/form-script' . $suffix . '.js', array( 'jquery' ), MAILSTER_VERSION );

			wp_enqueue_style( 'mailster-form-detail', MAILSTER_URI . 'assets/css/form-style' . $suffix . '.css', array(), MAILSTER_VERSION );
			wp_localize_script( 'mailster-form-detail', 'mailsterL10n', array(
				'require_save' => __( 'The changes you made will be lost if you navigate away from this page.', 'mailster' ),
				'not_saved' => __( 'You haven\'t saved your recent changes on this form!', 'mailster' ),
				'prev' => __( 'prev', 'mailster' ),
				'useit' => __( 'Use your form as', 'mailster' ) . '&hellip;',
			) );
			wp_localize_script( 'mailster-form-detail', 'mailsterdata', array(
				'embedcode' => $this->get_empty_subscribe_button(),
			) );

		else :

			wp_enqueue_style( 'mailster-forms-table', MAILSTER_URI . 'assets/css/forms-table-style' . $suffix . '.css', array(), MAILSTER_VERSION );

		endif;

	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function get_columns() {
		return $columns = array(
			'cb' => '<input type="checkbox" />',
			'name' => __( 'Name', 'mailster' ),
			'shortcode' => __( 'Shortcode', 'mailster' ),
			'fields' => __( 'Fields', 'mailster' ),
			'lists' => __( 'Lists', 'mailster' ),
			'occurrence' => __( 'Occurrence', 'mailster' ),
			'preview' => '',
		);

	}


	public function bulk_actions() {

		if ( empty( $_POST ) ) {
			return;
		}

		if ( empty( $_POST['forms'] ) ) {
			return;
		}

		if ( isset( $_POST['action'] ) && -1 != $_POST['action'] ) {
			$action = $_POST['action'];
		}

		if ( isset( $_POST['action2'] ) && -1 != $_POST['action2'] ) {
			$action = $_POST['action2'];
		}

		$redirect = add_query_arg( $_GET );

		switch ( $action ) {

			case 'delete':
				if ( current_user_can( 'mailster_delete_forms' ) ) {

					$success = $this->remove( $_POST['forms'] );
					if ( is_wp_error( $success ) ) {
						mailster_notice( sprintf( __( 'There was an error while deleting forms: %s', 'mailster' ), $success->get_error_message() ), 'error', true );

					} elseif ( $success ) {
						mailster_notice( sprintf( __( '%d forms have been removed', 'mailster' ), count( $_POST['forms'] ) ), 'error', true );
					}

					wp_redirect( $redirect );
					exit;

				}
			break;

			default:

			break;

		}

	}


	public function edit_entry() {

		if ( isset( $_POST['mailster_data'] ) ) {

			$data = (object) stripslashes_deep( $_POST['mailster_data'] );
			$redirect = $_POST['_wp_http_referer'];

			if ( isset( $_POST['save'] ) || isset( $_POST['structure'] ) || isset( $_POST['design'] ) || isset( $_POST['settings'] ) ) :

				parse_str( $_POST['_wp_http_referer'], $urlparams );

				$is_profile_form = isset( $_POST['profile_form'] ) && $_POST['profile_form'];

				if ( isset( $urlparams['new'] ) ) {

					$id = $this->add( $data );

					if ( is_wp_error( $id ) ) {
						mailster_notice( sprintf( __( 'There was an error while adding the form: %s', 'mailster' ), $id->get_error_message() ), 'error', true );

					}

					$redirect = remove_query_arg( 'new', add_query_arg( array( 'tab' => 'design', 'ID' => $id ), $redirect ) );

				} else {

					$id = $this->update( $data );

					if ( is_wp_error( $id ) ) {
						mailster_notice( sprintf( __( 'There was an error while updating the form: %s', 'mailster' ), $id->get_error_message() ), 'error', true );

					}
				}

				if ( isset( $_POST['mailster_structure'] ) ) {
					$structure = stripslashes_deep( $_POST['mailster_structure'] );
					if ( ! isset( $structure['fields']['email'] ) ) {
						$structure['fields']['email'] = mailster_text( 'email' );
					}

					$required = isset( $structure['required'] ) ? array_keys( $structure['required'] ) : array();
					$error_msg = isset( $structure['error_msg'] ) ? (array) $structure['error_msg'] : array();

					$this->update_fields( $id, $structure['fields'], $required, $error_msg );

				}

				if ( isset( $_POST['mailster_design'] ) ) {
					$design = stripslashes_deep( $_POST['mailster_design'] );

					$this->update_style( $id, urldecode( $design['style'] ), $design['custom'] );

				}

				if ( $is_profile_form ) {
					mailster_update_option( 'profile_form', $id );
				}

				if ( isset( $data->options ) ) {

					$this->update_options( $id, $data->options );

				}

				mailster_notice( isset( $urlparams['new'] ) ? __( 'Form added', 'mailster' ) : __( 'Form updated', 'mailster' ), 'success', true );

			endif;

			if ( isset( $_POST['design'] ) ) :

				wp_redirect( add_query_arg( array( 'tab' => 'design' ), $redirect ) );
				exit;

			elseif ( isset( $_POST['settings'] ) ) :

				wp_redirect( add_query_arg( array( 'tab' => 'settings' ), $redirect ) );
				exit;

			elseif ( isset( $_POST['structure'] ) ) :

				wp_redirect( add_query_arg( array( 'tab' => 'structure' ), $redirect ) );
				exit;

			elseif ( isset( $_POST['delete'] ) ) :

				if ( current_user_can( 'mailster_delete_forms' ) && $form = $this->get( intval( $_POST['mailster_data']['ID'] ) ) ) {
					$success = $this->remove( $form->ID );
					if ( is_wp_error( $success ) ) {
						mailster_notice( sprintf( __( 'There was an error while deleting forms: %s', 'mailster' ), $success->get_error_message() ), 'error', true );

					} elseif ( $success ) {
						mailster_notice( sprintf( __( 'Form %s has been removed', 'mailster' ), '<strong>&quot;' . $form->name . '&quot;</strong>' ), 'error', true );
						do_action( 'mailster_form_delete', $form->ID );
						do_action( 'mymail_form_delete', $form->ID );
					}

					wp_redirect( 'edit.php?post_type=newsletter&page=mailster_forms' );
					exit;

				};

			endif;

			wp_redirect( $redirect );
			exit;

		}

	}


	public function view_forms() {

		$suffix = SCRIPT_DEBUG ? '' : '.min';

		if ( isset( $_GET['ID'] ) || isset( $_GET['new'] ) ) :

			include MAILSTER_DIR . 'views/forms/detail.php';

		else :

			include MAILSTER_DIR . 'views/forms/overview.php';

		endif;

	}


	/**
	 *
	 *
	 * @param unknown $form
	 */
	public function edit_form( $form ) {

		include MAILSTER_DIR . 'views/forms/edit.php';
	}


	public function screen_options() {

		require_once MAILSTER_DIR . 'classes/forms.table.class.php';

		$screen = get_current_screen();

		add_screen_option( 'per_page', array(
				'label' => __( 'Forms', 'mailster' ),
				'default' => 10,
				'option' => 'mailster_forms_per_page',
		) );

	}


	/**
	 *
	 *
	 * @param unknown $status
	 * @param unknown $option
	 * @param unknown $value
	 * @return unknown
	 */
	public function save_screen_options( $status, $option, $value ) {

		if ( 'mailster_forms_per_page' == $option ) {
			return $value;
		}

		return $status;

	}


	/**
	 *
	 *
	 * @param unknown $args     (optional)
	 * @param unknown $endpoint (optional)
	 * @return unknown
	 */
	public function url( $args = array(), $endpoint = null ) {

		if ( is_null( $endpoint ) ) {
			$endpoint = plugins_url( basename( MAILSTER_DIR ) . '/form.php' );
		}

		return apply_filters( 'mailster_form_url', add_query_arg( $args , $endpoint ) );

	}


	/**
	 *
	 *
	 * @param unknown $entry
	 * @return unknown
	 */
	public function update( $entry ) {

		global $wpdb;

		$data = (array) $entry;

		if ( ! isset( $data['ID'] ) ) {
			return new WP_Error( 'id_required', __( 'updating form requires ID', 'mailster' ) );
		}

		$now = time();

		$lists = isset( $data['lists'] ) ? $data['lists'] : false;
		unset( $data['lists'] );

		$wpdb->suppress_errors();

		if ( false !== $wpdb->update( "{$wpdb->prefix}mailster_forms", $data, array( 'ID' => $data['ID'] ) ) ) {

			$form_id = intval( $data['ID'] );

			if ( $lists ) {
				$this->assign_lists( $form_id, $lists, true );
			}

			do_action( 'mailster_update_form', $form_id );
			do_action( 'mymail_update_form', $form_id );

			mailster_clear_cache( 'form' );

			return $form_id;

		} else {

			return new WP_Error( 'form_exists', $wpdb->last_error );
		}

	}


	/**
	 *
	 *
	 * @param unknown $entry
	 * @return unknown
	 */
	public function add( $entry ) {

		global $wpdb;

		$now = time();

		$entry = is_string( $entry ) ? array( 'name' => $entry ) : (array) $entry;

		$entry = wp_parse_args( $entry, array(
				'name' => __( 'Form', 'mailster' ),
				'submit' => mailster_text( 'submitbutton' ),
				'asterisk' => true,
				'userschoice' => false,
				'dropdown' => false,
				'inline' => false,
				'overwrite' => true,
				'addlists' => false,
				'prefill' => false,
				'style' => '',
				'custom_style' => '',
				'doubleoptin' => true,
				'subject' => __( 'Please confirm', 'mailster' ),
				'headline' => __( 'Please confirm your Email Address', 'mailster' ),
				'content' => sprintf( __( 'You have to confirm your email address. Please click the link below to confirm. %s', 'mailster' ), "\n{link}" ),
				'link' => __( 'Click here to confirm', 'mailster' ),
				'resend' => false,
				'resend_count' => 2,
				'resend_time' => 48,
				'template' => 'notification.html',
				'vcard' => false,
				'vcard_content' => $this->get_vcard(),
				'confirmredirect' => '',
				'redirect' => '',
				'added' => $now,
				'updated' => $now,
		) );

		$wpdb->suppress_errors();

		if ( $wpdb->insert( "{$wpdb->prefix}mailster_forms", $entry ) ) {

			$form_id = $wpdb->insert_id;

			do_action( 'mailster_add_form', $form_id );
			do_action( 'mymail_add_form', $form_id );

			return $form_id;

		} else {

			return new WP_Error( 'form_exists', $wpdb->last_error );
		}

	}


	/**
	 *
	 *
	 * @param unknown $form_ids
	 * @param unknown $lists
	 * @param unknown $remove_old (optional)
	 * @return unknown
	 */
	public function assign_lists( $form_ids, $lists, $remove_old = false ) {

		global $wpdb;

		if ( ! is_array( $form_ids ) ) {
			$form_ids = array( $form_ids );
		}

		if ( ! is_array( $lists ) ) {
			$lists = array( $lists );
		}

		$now = time();

		$inserts = array();
		foreach ( $lists as $list_id ) {
			foreach ( $form_ids as $form_id ) {
				$inserts[] = "($list_id, $form_id, $now)";
			}
		}

		if ( empty( $inserts ) ) {
			return true;
		}

		$chunks = array_chunk( $inserts, 200 );

		$success = true;

		if ( $remove_old ) {
			$this->unassign_lists( $form_ids, null, $lists );
		}

		foreach ( $chunks as $insert ) {
			$sql = "INSERT INTO {$wpdb->prefix}mailster_forms_lists (list_id, form_id, added) VALUES ";

			$sql .= ' ' . implode( ',', $insert );

			$sql .= ' ON DUPLICATE KEY UPDATE list_id = values(list_id), form_id = values(form_id)';

			$success = $success && ( false !== $wpdb->query( $sql ) );

		}
		return $success;

	}


	/**
	 *
	 *
	 * @param unknown $form_ids
	 * @param unknown $lists    (optional)
	 * @param unknown $not_list (optional)
	 * @return unknown
	 */
	public function unassign_lists( $form_ids, $lists = null, $not_list = null ) {

		global $wpdb;

		$form_ids = ! is_array( $form_ids ) ? array( intval( $form_ids ) ) : array_filter( $form_ids, 'is_numeric' );

		$sql = "DELETE FROM {$wpdb->prefix}mailster_forms_lists WHERE form_id IN (" . implode( ', ', $form_ids ) . ')';

		if ( ! is_null( $lists ) && ! empty( $lists ) ) {
			if ( ! is_array( $lists ) ) {
				$lists = array( $lists );
			}

			$sql .= ' AND list_id IN (' . implode( ', ', array_filter( $lists, 'is_numeric' ) ) . ')';
		}
		if ( ! is_null( $not_list ) && ! empty( $not_list ) ) {
			if ( ! is_array( $not_list ) ) {
				$not_list = array( $not_list );
			}

			$sql .= ' AND list_id NOT IN (' . implode( ', ', array_filter( $not_list, 'is_numeric' ) ) . ')';
		}

		if ( false !== $wpdb->query( $sql ) ) {

			do_action( 'mailster_unassign_form_lists', $form_ids, $lists, $not_list );
			do_action( 'mymail_unassign_form_lists', $form_ids, $lists, $not_list );

			return true;
		}

		return false;

	}


	/**
	 *
	 *
	 * @param unknown $form_id
	 * @param unknown $field
	 * @param unknown $value
	 * @param unknown $required  (optional)
	 * @param unknown $error_msg (optional)
	 * @return unknown
	 */
	public function update_field( $form_id, $field, $value, $required = null, $error_msg = '' ) {

		return $this->update_fields( $form_id, array( $field => $value ), ( $required ? array( $field ) : array() ), array( $field => $error_msg ) );

	}


	/**
	 *
	 *
	 * @param unknown $form_id
	 * @param unknown $fields
	 * @param unknown $required  (optional)
	 * @param unknown $error_msg (optional)
	 * @return unknown
	 */
	public function update_fields( $form_id, $fields, $required = array(), $error_msg = array() ) {

		global $wpdb;

		$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->prefix}mailster_form_fields WHERE form_id = %d AND field_id NOT IN ('" . implode( "', '", array_keys( $fields ) ) . "')", $form_id ) );

		$sql = "INSERT INTO {$wpdb->prefix}mailster_form_fields (form_id, field_id, name, error_msg, required, position) VALUES ";

		$entries = array();
		$position = 0;
		foreach ( $fields as $field_id => $name ) {
			$entries[] = $wpdb->prepare( '(%d, %s, %s, %s, %d, %d)', $form_id, $field_id, $name, ( isset( $error_msg[ $field_id ] ) ? $error_msg[ $field_id ] : '' ), ( in_array( $field_id, $required ) || $field_id == 'email' ), $position++ );
		}

		$sql .= implode( ', ', $entries );
		$sql .= ' ON DUPLICATE KEY UPDATE name = values(name), error_msg = values(error_msg), required = values(required), position = values(position)';

		return false !== $wpdb->query( $sql );

	}


	/**
	 *
	 *
	 * @param unknown $form_id
	 * @param unknown $field
	 * @param unknown $value   (optional)
	 * @return unknown
	 */
	public function update_options( $form_id, $field, $value = null ) {

		global $wpdb;

		$data = is_array( $field ) ? $field : array( $field => $value );

		$sql = $wpdb->prepare( "UPDATE {$wpdb->prefix}mailster_forms SET ID = %d", $form_id );

		$entries = array();
		foreach ( $data as $col => $value ) {
			$sql .= $wpdb->prepare( ", `$col` = %s", $value );
		}

		$sql .= $wpdb->prepare( ' WHERE ID = %d', $form_id );

		return false !== $wpdb->query( $sql );

	}


	/**
	 *
	 *
	 * @param unknown $form_id
	 * @param unknown $style
	 * @param unknown $custom_style (optional)
	 * @return unknown
	 */
	public function update_style( $form_id, $style, $custom_style = '' ) {

		global $wpdb;

		if ( $style == '{}' ) {
			$style = '';
		}

		$sql = $wpdb->prepare( "UPDATE {$wpdb->prefix}mailster_forms SET ID = %d, style = %s, custom_style = %s WHERE ID = %d", $form_id, $style, strip_tags( $custom_style ), $form_id );

		return false !== $wpdb->query( $sql );

	}


	/**
	 *
	 *
	 * @param unknown $form_ids
	 * @return unknown
	 */
	public function remove( $form_ids ) {

		global $wpdb;

		$form_ids = ! is_array( $form_ids ) ? array( intval( $form_ids ) ) : array_filter( $form_ids, 'is_numeric' );

		// delete from forms, form_fields
		$sql = "DELETE a,b FROM {$wpdb->prefix}mailster_forms AS a LEFT JOIN {$wpdb->prefix}mailster_form_fields AS b ON ( a.ID = b.form_id ) WHERE a.ID IN (" . implode( ',', $form_ids ) . ')';

		$success = false !== $wpdb->query( $sql );

		if ( $wpdb->last_error ) {
			return new WP_Error( 'db_error', $wpdb->last_error );
		}

		return $success;

	}


	/**
	 *
	 *
	 * @param unknown $ID
	 * @param unknown $fields (optional)
	 * @param unknown $lists  (optional)
	 * @return unknown
	 */
	public function get( $ID = null, $fields = true, $lists = true ) {

		global $wpdb;

		if ( is_null( $ID ) ) {
			$sql = "SELECT a.* FROM {$wpdb->prefix}mailster_forms AS a WHERE 1 ORDER BY ID";

		} else {
			$sql = "SELECT a.* FROM {$wpdb->prefix}mailster_forms AS a WHERE a.ID = %d LIMIT 1";

			$sql = $wpdb->prepare( $sql, $ID );
		}

		if ( ! ( $forms = $wpdb->get_results( $sql ) ) ) {
			return false;
		}

		foreach ( $forms as $i => $form ) {

			if ( $fields ) {
				$forms[ $i ]->fields = $this->get_fields( $forms[ $i ]->ID );

				$forms[ $i ]->required = array();
				foreach ( $forms[ $i ]->fields as $field ) {
					if ( $field->required ) {
						$forms[ $i ]->required[] = $field->field_id;
					}
				}
			}

			if ( $lists ) {
				$forms[ $i ]->lists = $this->get_lists( $forms[ $i ]->ID, true );
			}

			$forms[ $i ]->style = ( $forms[ $i ]->style ) ? json_decode( $forms[ $i ]->style ) : array();
			$forms[ $i ]->stylesheet = '';
			foreach ( $forms[ $i ]->style as $selectors => $data ) {
				$forms[ $i ]->stylesheet .= '.mailster-form.mailster-form-' . $forms[ $i ]->ID . ' ' . $selectors . '{';
				foreach ( $data as $key => $value ) {
					$forms[ $i ]->stylesheet .= $key . ':' . $value . ';';
				}
				$forms[ $i ]->stylesheet .= '}';
			}
			$forms[ $i ]->stylesheet .= $forms[ $i ]->custom_style;
			if ( empty( $forms[ $i ]->submit ) ) {
				$forms[ $i ]->submit = mailster_text( 'submitbutton' );
			}
		}

		return is_null( $ID ) ? $forms : $forms[0];

	}


	/**
	 *
	 *
	 * @param unknown $fields (optional)
	 * @param unknown $lists  (optional)
	 * @return unknown
	 */
	public function get_all( $fields = false, $lists = false ) {

		return $this->get( null, $fields, $lists );

	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function get_list() {

		global $wpdb;

		$sql = "SELECT a.ID, a.name FROM {$wpdb->prefix}mailster_forms AS a WHERE 1 ORDER BY ID";

		if ( ! ( $forms = $wpdb->get_results( $sql ) ) ) {
			return array();
		}

		$return = array();

		foreach ( $forms as $i => $form ) {
			$return[ $form->ID ] = $form->name;
		}

		return $return;

	}


	/**
	 *
	 *
	 * @param unknown $id
	 * @param unknown $ids_only (optional)
	 * @return unknown
	 */
	public function get_lists( $id, $ids_only = false ) {

		global $wpdb;

		$cache = mailster_cache_get( 'forms_lists' );
		if ( isset( $cache[ $id ] ) ) {
			return $cache[ $id ];
		}

		$sql = "SELECT a.* FROM {$wpdb->prefix}mailster_lists AS a LEFT JOIN {$wpdb->prefix}mailster_forms_lists AS ab ON a.ID = ab.list_id WHERE ab.form_id = %d";

		$lists = $wpdb->get_results( $wpdb->prepare( $sql, $id ) );

		return $ids_only ? wp_list_pluck( $lists, 'ID' ) : $lists;

	}


	/**
	 *
	 *
	 * @param unknown $form_id
	 * @return unknown
	 */
	public function get_fields( $form_id ) {

		global $wpdb;

		$sql = "SELECT a.field_id, a.name, a.error_msg ,a.required FROM {$wpdb->prefix}mailster_form_fields AS a WHERE a.form_id = %d ORDER BY a.position ASC";

		$fields = $wpdb->get_results( $wpdb->prepare( $sql, $form_id ) );

		foreach ( $fields as $i => $field ) {
			if ( empty( $field->error_msg ) ) {
				$field->error_msg = ( $field->field_id == 'email' )
					? __( 'Email is missing or wrong', 'mailster' )
					: sprintf( __( '%s is missing', 'mailster' ), $field->name );
			}
			unset( $fields[ $i ] );
			$fields[ $field->field_id ] = $field;
		}

		return $fields;

	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function get_empty() {

		global $wpdb;

		$fields = wp_parse_args( array(), $wpdb->get_col( "DESCRIBE {$wpdb->prefix}mailster_forms" ) );

		$form = (object) array_fill_keys( array_values( $fields ), null );

		$form->fields = array();

		return $form;

	}


	/**
	 *
	 *
	 * @param unknown $form_id
	 * @return unknown
	 */
	public function get_occurrence( $form_id ) {

		global $wpdb;

		$return = array();
		$empty = (object) array( 'posts' => array(), 'widgets' => array() );
		$empty = array( 'posts' => array() );

		if ( false === ( $occurrence = mailster_cache_get( 'forms_occurrence' ) ) ) {

			$occurrence = array();

			$sql = "SELECT ID, post_title AS name, post_content FROM {$wpdb->posts} WHERE post_content LIKE '%[newsletter_signup_form%' AND post_status NOT IN ('inherit') AND post_type NOT IN ('newsletter', 'attachment')";

			$result = $wpdb->get_results( $sql );
			$i = 100;

			foreach ( $result as $row ) {
				preg_match_all( '#\[newsletter_signup_form((.*)id="?(\d+)"?)?#', $row->post_content, $matches );
				foreach ( $matches[3] as $found_form_id ) {
					if ( ! $found_form_id ) {
						$found_form_id = 0;
					}

					$occurrence[ $found_form_id ]['posts'][ $row->ID ] = $row->name;
				}
			}

			$sql = "SELECT option_id AS ID, option_value FROM {$wpdb->options} WHERE option_name = 'widget_mailster_signup'";
			$result = $wpdb->get_results( $sql );

			foreach ( $result as $row ) {
				$widgetdata = maybe_unserialize( $row->option_value );
				foreach ( $widgetdata as $data ) {
					if ( ! isset( $data['form'] ) ) {
						continue;
					}

					$found_form_id = $data['form'];
					$occurrence[ $found_form_id ]['widgets'][] = $data['title'];
				}
			}

			mailster_cache_add( 'forms_occurrence', $occurrence );

		}

		return isset( $occurrence[ $form_id ] ) ? $occurrence[ $form_id ] : null;

	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function get_count() {

		global $wpdb;
		$sql = "SELECT COUNT(*) FROM {$wpdb->prefix}mailster_forms";

		return $wpdb->get_var( $sql );

	}


	/**
	 *
	 *
	 * @param unknown $style
	 * @param unknown $selector
	 * @param unknown $property
	 */
	private function _get_style( $style, $selector, $property ) {

		echo ( isset( $style->{$selector} ) && isset( $style->{$selector}->{$property} ) ) ? $style->{$selector}->{$property} : '';

	}


	/**
	 *
	 *
	 * @param unknown $form_id (optional)
	 * @param unknown $args    (optional)
	 */
	public function subscribe_button( $form_id = 1, $args = array() ) {

		echo $this->get_subscribe_button( $form_id, $args );
	}


	/**
	 *
	 *
	 * @param unknown $form_id (optional)
	 * @param unknown $args    (optional)
	 * @return unknown
	 */
	public function get_subscribe_button( $form_id = 1, $args = array() ) {

		$options = wp_parse_args( $args, array(
			'showcount' => false,
			'design' => 'default',
			'label' => mailster_text( 'submitbutton' ),
			'width' => 480,
			'endpoint' => null,
		) );

		$button_src = apply_filters( 'mymail_subscribe_button_src', apply_filters( 'mailster_subscribe_button_src', '//mailster.github.io/v1/button.js', $options ), $options );
		// $button_src = apply_filters('mailster_subscribe_button_src', MAILSTER_URI.'assets/js/button.js', $options);
		$options['endpoint'] = $this->url( array(
			'id' => $form_id,
			'iframe' => 1,
		), $options['endpoint'] );

		$html = '<a href="' . $options['endpoint'] . '" class="mailster-subscribe-button" data-design="' . esc_attr( $options['design'] ) . '" data-showcount="' . ( $options['showcount'] ? 1 : 0 ) . '" data-width="' . esc_attr( $options['width'] ) . '">' . strip_tags( $options['label'] ) . '</a>';

		$script = "<script type=\"text/javascript\">!function(m,a,i,l,s,t,r){m[s]=m[s]||(function(){t=a.createElement(i);r=a.getElementsByTagName(i)[0];t.async=1;t.src=l;r.parentNode.insertBefore(t,r);return !0}())}(window,document,'script','$button_src','MailsterSubscribe');</script>";

		return $html . $script;
	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function get_empty_subscribe_button() {

		$button = $this->get_subscribe_button( 1, array( 'showcount' => true, 'width' => 999, 'label' => 'Subscribe' ) );

		$button = strtr( $button, array(
			'id=1' => 'id=%ID%',
			' data-showcount="1"' => '%SHOWCOUNT%',
			' data-width="999"' => '%WIDTH%',
			' data-design="default"' => '%DESIGN%',
			'>Subscribe<' => '>%LABEL%<',
		) );

		return $button;
	}


	/**
	 *
	 *
	 * @return unknown
	 */
	public function get_vcard() {

		$tags = mailster_option( 'tags' );

		$text = 'BEGIN:VCARD' . "\n";
		$text .= 'N:Firstname;Lastname;;;' . "\n";
		$text .= 'ADR;INTL;PARCEL;WORK:;;StreetName;City;State;123456;Country' . "\n";
		$text .= 'EMAIL;INTERNET:' . mailster_option( 'from' ) . "\n";
		$text .= 'ORG:' . $tags['company'] . "\n";
		$text .= 'URL;WORK:' . $tags['homepage'] . "\n";
		$text .= 'END:VCARD' . "\n";
		return $text;
	}


	/**
	 *
	 *
	 * @param unknown $new
	 */
	public function on_activate( $new ) {

		// create form if non exists
		$forms = $this->get_all();
		if ( empty( $forms ) ) {
			$form_id = $this->add( array(
				'name' => __( 'Default Form', 'mailster' ),
				'submit' => __( 'Subscribe', 'mailster' ),
			) );
			$this->update_field( $form_id, 'email', __( 'Email', 'mailster' ) );
			mailster_update_option( 'profile_form', $form_id );
		}

	}


}