<?php

use \Heyday\VersionedDataObjects\VersionedModelAdmin;

/**
 * @package elemental
 */
class ElementalAdmin extends VersionedModelAdmin {

    private static $managed_models = array(
        'BaseElement'
    );

    private static $menu_title = 'Content Blocks';

    private static $url_segment = 'elemental';

    private static $menu_icon = "elemental/images/blocks.svg";

    public function getEditForm($id = null, $fields = null) {
        $form = parent::getEditForm($id, $fields);

        $grid = $form->Fields()
            ->dataFieldByName($this->sanitiseClassName($this->modelClass));

        $grid->getConfig()->removeComponentsByType('GridFieldAddNewButton');

        return $form;
    }

    /**
     * Exclude our linked elements
     *
     * @return DataList
     */
    public function getList() {
        $list = parent::getList();
        //$list = $list->exclude('ClassName', 'ElementVirtualLinked');

        return $list;
    }
}
