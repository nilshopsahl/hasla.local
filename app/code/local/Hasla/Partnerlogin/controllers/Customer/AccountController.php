<?php
require_once Mage::getModuleDir('controllers', 'Mage_Customer').DS.'AccountController.php';
class Hasla_Partnerlogin_Customer_AccountController extends Mage_Customer_AccountController{
	/* Cookie Action */
	
	protected $_cookieCheckActions = array('loginPost', 'createpost','partnerpost');
	protected $_DefaultActions= array('login','logout','logoutsuccess','create','confirm','confirmation',
						'forgotpassword','forgotpasswordpost','resetpassword','resetpasswordpost');
							
	protected $customActions=array('partnerlogin','partnerpost');	
    /**
     * Action predispatch
     *
     * Check customer authentication for some actions
     */
    public function preDispatch()
    {
		$currentAction=$this->getRequest()->getActionName();
		 $Custompattern = '/^(' . implode('|', $this->customActions) . ')/i';
		 
		if(preg_match($Custompattern,$currentAction)){
			$this->getRequest()->setActionName('login');
		}
		parent::preDispatch();
		/* 
		check $currentAction value action check not  match  current setAction
		and reset to current action
		*/
		if($currentAction!=$this->getRequest()->getActionName()){
			$this->getRequest()->setActionName($currentAction);
		}
		
		if(!$this->getRequest()->isDispatched()){
			return;
		}
		
		
        $pattern = '/^(' . implode('|', $this->_getValidActions()) . ')/i';

        if (!preg_match($pattern, $action)) {
            if (!$this->_getSession()->authenticate($this)) {
                $this->setFlag('', 'no-dispatch', true);
            }
        } else {
            $this->_getSession()->setNoReferer(true);
        }
		
    }
	  protected function _getValidActions()
	  {
	  return implode("|", array_merge($this->_DefaultActions, $this->customActions));
	  }
									
	public function indexAction(){
		parent::indexAction();
	}
		

    /**
     * Partnerlogin login form page
     */
    public function partnerloginAction()
    {
        if ($this->_getSession()->isLoggedIn()) {
            $this->_redirect('*/*/');
            return;
        }
        $this->getResponse()->setHeader('Login-Required', 'true');
        $this->loadLayout();
        $this->_initLayoutMessages('customer/session');
        $this->_initLayoutMessages('catalog/session');
        $this->renderLayout();
    }
    /**
     * Login post action
     */
    public function partnerpostAction()
    {
        if (!$this->_validateFormKey()) {
            $this->_redirect('*/*/partnerlogin/');
            return;
        }

        if ($this->_getSession()->isLoggedIn()) {
            $this->_redirect('*/*/partnerlogin/');
            return;
        }
        $session = $this->_getSession();

        if ($this->getRequest()->isPost()) {
            $login = $this->getRequest()->getPost('login');
            if (!empty($login['username']) && !empty($login['password'])) {
                try {
                    $session->login($login['username'], $login['password']);
                    if ($session->getCustomer()->getIsJustConfirmed()) {
                        $this->_welcomeCustomer($session->getCustomer(), true);
                    }
                } catch (Mage_Core_Exception $e) {
                    switch ($e->getCode()) {
                        case Mage_Customer_Model_Customer::EXCEPTION_EMAIL_NOT_CONFIRMED:
                            $value = $this->_getHelper('customer')->getEmailConfirmationUrl($login['username']);
                            $message = $this->_getHelper('customer')->__('This account is not confirmed. <a href="%s">Click here</a> to resend confirmation email.', $value);
                            break;
                        case Mage_Customer_Model_Customer::EXCEPTION_INVALID_EMAIL_OR_PASSWORD:
                            $message = $e->getMessage();
                            break;
                        default:
                            $message = $e->getMessage();
                    }
                    $session->addError($message);
                    $session->setUsername($login['username']);
                } catch (Exception $e) {
                    // Mage::logException($e); // PA DSS violation: this exception log can disclose customer password
                }
            } else {
                $session->addError($this->__('Login and password are required.'));
            }
        }

        $this->_partnerPostRedirect();
    }

	    /**
     * Define target URL and redirect customer after logging in
     */
    protected function _partnerPostRedirect()
    {
        $session = $this->_getSession();

        if (!$session->getBeforeAuthUrl() || $session->getBeforeAuthUrl() == Mage::getBaseUrl()) {
            // Set default URL to redirect customer to
            $session->setBeforeAuthUrl($this->_getHelper('customer')->getAccountUrl());
            // Redirect customer to the last page visited after logging in
            if ($session->isLoggedIn()) {
                if (!Mage::getStoreConfigFlag(
                    Mage_Customer_Helper_Data::XML_PATH_CUSTOMER_STARTUP_REDIRECT_TO_DASHBOARD
                )) {
                    $referer = $this->getRequest()->getParam(Mage_Customer_Helper_Data::REFERER_QUERY_PARAM_NAME);
                    if ($referer) {
                        // Rebuild referer URL to handle the case when SID was changed
                        $referer = $this->_getModel('core/url')
                            ->getRebuiltUrl( $this->_getHelper('core')->urlDecode($referer));
                        if ($this->_isUrlInternal($referer)) {
                            $session->setBeforeAuthUrl($referer);
                        }
                    }
                } else if ($session->getAfterAuthUrl()) {
                    $session->setBeforeAuthUrl($session->getAfterAuthUrl(true));
                }
            } else {
				$Url=str_replace('login','partnerlogin',$this->_getHelper('customer')->getLoginUrl());
                $session->setBeforeAuthUrl($Url);
          }
        } else if ($session->getBeforeAuthUrl() ==  $this->_getHelper('customer')->getLogoutUrl()) {
            $session->setBeforeAuthUrl( $this->_getHelper('customer')->getDashboardUrl());
        } else {
			
            if (!$session->getAfterAuthUrl()) {
                $session->setAfterAuthUrl($session->getBeforeAuthUrl());
            }
            if ($session->isLoggedIn()) {
                $session->setBeforeAuthUrl($session->getAfterAuthUrl(true));
				
            }
				
			if (!$this->_getSession()->isLoggedIn()) {
            $this->_redirect('*/*/partnerlogin/');
            return;
        }

			
        }
        $this->_redirectUrl($session->getBeforeAuthUrl(true));
    }


	
									

}
				