<?php
/**
 * Ce fichier est destine a permettre la surcharge de certaines methodes de
 * la classe om_application pour des besoins specifiques de l'application
 *
 * @package framework_openmairie
 * @version SVN : $Id: framework_openmairie.class.php 4348 2018-07-20 16:49:26Z softime $
 */

/**
 *
 */
if (file_exists("../dyn/locales.inc.php") === true) {
    require_once "../dyn/locales.inc.php";
}

/**
 * Définition de la constante représentant le chemin d'accès au framework
 */
define("PATH_OPENMAIRIE", getcwd()."/../core/");

/**
 * Dépendances PHP du framework
 * On modifie la valeur de la directive de configuration include_path en
 * fonction pour y ajouter les chemins vers les librairies dont le framework
 * dépend.
 */
set_include_path(
    get_include_path().PATH_SEPARATOR.implode(
        PATH_SEPARATOR,
        array(
            getcwd()."/../php/pear",
            getcwd()."/../php/db",
            getcwd()."/../php/fpdf",
            getcwd()."/../php/phpmailer",
            getcwd()."/../php/tcpdf",
        )
    )
);

/**
 *
 */
if (file_exists("../dyn/debug.inc.php") === true) {
    require_once "../dyn/debug.inc.php";
}

/**
 *
 */
require_once PATH_OPENMAIRIE."om_application.class.php";

/**
 *
 */
class framework_openmairie extends application {

    /**
     * Cette variable est un marqueur permettant d'indiquer si nous sommes
     * en mode développement du framework ou non.
     * @var boolean
     */
    protected $_framework_development_mode = true;

    /**
     * Gestion du nom de l'application.
     *
     * @var mixed Configuration niveau application.
     */
    protected $_application_name = "openhabilitation";

    /**
     * Titre HTML.
     *
     * @var mixed Configuration niveau application.
     */
    protected $html_head_title = ":: openRH :: habilitation";

	protected $version = "1.0.0";

    protected $_session_name = "openhabilitation";

    /**
     *
     * @return void
     */
    function setDefaultValues() {

        $this->addHTMLHeadCss(
            array(
                "../om-theme/jquery-ui-theme/jquery-ui.custom.css",
                "../om-theme/om.css",
            ),
            21
        );
        
        
        $this->addHTMLHeadJs(
            array(
                "../app/lib/Chart.bundle.min.js",
            ),
            11
        );
		

    }

    /**
     * Surcharge - set_config__menu().
     *
     * @return void
     */
    protected function set_config__menu() {
        parent::set_config__menu();
        $parent_menu = $this->config__menu;
		// {{{ Rubrique APPLICATION
		//
		$rubrik = array(
			"title" => _("application"),
			"class" => "application",
		);
		//
		$links = array();
		//
		// ---> 
		//

		$links[] = array(
			"href" => OM_ROUTE_TAB."&obj=agent",
			"class" => "agent",
			"title" => _("agent"),
			"right" => array("agent", "agent_tab", ),
			"open" => array(
				"tab.php|agent",
				"index.php|agent[module=tab]",
				"form.php|agent",
				"index.php|agent[module=form]",
			),
		);



		$links[] = array(
			"href" => OM_ROUTE_TAB."&obj=agent_habilitation",
			"class" => "agent_habilitation",
			"title" => _("agent_habilitation"),
			"right" => array("agent_habilitation", "agent_habilitation_tab", ),
			"open" => array(
				"tab.php|agent_habilitation",
				"index.php|agent_habilitation[module=tab]",
				"form.php|agent_habilitation",
				"index.php|agent_habilitation[module=form]",
			),
		);


		
		$rubrik['links'] = $links;
		//
		$menu[] = $rubrik;
		// }}}

		// {{{ Rubrique PARAMETRAGE
		//
		$rubrik = array(
			"title" => _("parametrage metier"),
			"class" => "parametrage",
		);
		//
		$links = array();
		//

		 $links[] = array(
			"href" => OM_ROUTE_TAB."&obj=habilitation",
			"class" => "habilitation",
			"title" => _("habilitation"),
			"right" => array("habilitation", "habilitation_tab", ),
			"open" => array(
				"tab.php|habilitation",
				"index.php|habilitation[module=tab]",
				"form.php|habilitation",
				"index.php|habilitation[module=form]",
			),
		);

		$links[] = array(
			"href" => OM_ROUTE_TAB."&obj=condition",
			"class" => "condition",
			"title" => _("condition"),
			"right" => array("condition", "condition_tab", ),
			"open" => array(
				"tab.php|condition",
				"index.php|condition[module=tab]",
				"form.php|condition",
				"index.php|condition[module=form]",
			),
		);	


		
		$links[] = array(
			"href" => OM_ROUTE_TAB."&obj=service",
			"class" => "service",
			"title" => _("service"),
			"right" => array("service", "service_tab", ),
			"open" => array(
				"tab.php|service",
				"index.php|service[module=tab]",
				"form.php|service",
				"index.php|service[module=form]",
			),
		);

		$links[] = array(
			"href" => OM_ROUTE_TAB."&obj=poste",
			"class" => "poste",
			"title" => _("poste"),
			"right" => array("poste", "poste_tab", ),
			"open" => array(
				"tab.php|poste",
				"index.php|poste[module=tab]",
				"form.php|poste",
				"index.php|poste[module=form]",
			),
		);

		$links[] = array(
			"href" => OM_ROUTE_TAB."&obj=organisme",
			"class" => "organisme",
			"title" => _("organisme"),
			"right" => array("organisme", "organisme_tab", ),
			"open" => array(
				"tab.php|organisme",
				"index.php|organisme[module=tab]",
				"form.php|organisme",
				"index.php|organisme[module=form]",
			),
		);

		$links[] = array(
			"href" => OM_ROUTE_TAB."&obj=categorie",
			"class" => "categorie",
			"title" => _("categorie"),
			"right" => array("categorie", "categorie_tab", ),
			"open" => array(
				"tab.php|categorie",
				"index.php|categorie[module=tab]",
				"form.php|categorie",
				"index.php|categorie[module=form]",
			),
		);
		$rubrik['links'] = $links;
		//
		$menu[] = $rubrik;
		// }}}

        $this->config__menu = array_merge(
            $menu,
            $parent_menu
        );
        
	}




}
