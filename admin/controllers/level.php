<?php
/**
 * @package      ITPrism Components
 * @subpackage   Gamification
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2010 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * Gamification is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// No direct access
defined('_JEXEC') or die;

jimport('itprism.controller.form');

/**
 * Gamification rank controller class.
 *
 * @package		ITPrism Components
 * @subpackage	Gamification
 * @since		1.6
 */

class GamificationControllerLevel extends ITPrismControllerForm {
    
	/**
     * Proxy for getModel.
     * @since   1.6
     */
    public function getModel($name = 'Level', $prefix = 'GamificationModel', $config = array('ignore_request' => true)) {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
    
    /**
     * Save an item
     */
    public function save(){
        
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
        $app = JFactory::getApplication();
        /** @var $app JAdministrator **/
        
        $data    = $app->input->post->get('jform', array(), 'array');
        $itemId  = JArrayHelper::getValue($data, "id");
        
        $model   = $this->getModel();
        /** @var $model GamificationModelRank **/
        
        $form    = $model->getForm($data, false);
        /** @var $form JForm **/
        
        if(!$form){
            throw new Exception($model->getError(), 500);
        }
            
        // Validate the form
        $validData = $model->validate($form, $data);
        
        // Check for errors
        if($validData === false){
            
            $this->defaultLink .= "&view=".$this->view_item.$this->getRedirectToItemAppend($itemId);
            
            $this->setMessage($model->getError(), "notice");
            $this->setRedirect(JRoute::_($this->defaultLink, false));
            return ;
        }
            
        try{
            
            $itemId = $model->save($validData);
                
        } catch (Exception $e){
            
            JLog::add($e->getMessage());
            throw new Exception(JText::_('COM_GAMIFICATION_ERROR_SYSTEM'));
        
        }
        
        $link = $this->prepareRedirectLink($itemId);
        $this->setRedirect(JRoute::_($link, false), JText::_('COM_GAMIFICATION_LEVEL_SAVED'));
    
    }
    
    
}