<?php

class sportigoo_search_Widget extends WP_Widget {
    /**
     * Initialer le widget, le nommer, etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'my_widget',
            'description' => 'Module de recherche dans le blog',
        );
        parent::__construct( 'sportigoo_search_Widget', 'Recherche Sportigoo', $widget_ops );
    }

    /**
     * Fonction qui affichera le résultat HTML sur le site
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance) {
        // Vérifier l’existence des données, sinon vide.
        $title = $instance['title'] ?: '';

        // Wrappeur HTML
        echo $args['before_widget'];

        // Titre du widget
        echo $args['before_title'] . $title . $args['after_title']; ?>

        <!-- Corps HTML de notre Widget -->
        <div class="widget__search">
            <form action="<?php echo site_url() ?>" role="search" method="get">
                <p>
                    <input type="text" required name="s" placeholder="Rechecher..."
                           value="<?php the_search_query(); ?>"/>
                </p>
                <p>
                    <input class="button bg-blue" type="submit" value="Rechercher"/>
                </p>
            </form>
        </div>

        <?php echo $args['after_widget'];
    }

    /**
     * Formulaire de réglage dans l'administration
     *
     * @param array $instance The widget options
     */
    public function form($instance) {
        $title = !empty( $instance['title'] ) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                Titre
            </label>
            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>"
            />
        </p>
        <?php
    }

    /**
     * Sauvegarder les options du widget
     *
     * @param array $new_instance Nouvelles options
     * @param array $old_instance Anciennes options
     * @return array
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = !empty( $new_instance['title'] ) ?
            strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}

