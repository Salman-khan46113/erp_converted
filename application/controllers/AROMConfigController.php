<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AROMConfigController extends CI_Controller {
	
	/**
	 * Configure current financial year
	 */
	public function getFinancialYear() {
		return "24-25";
	}
	
	public function getCustomerPrefix() {
		return $this->readConfig("customerPrefix","CP");
	}

	/**
	 * Configure customer name for invoice etc.
	 */
	public function getCustomerNameDetails() {
		return $this->readConfig("customerNameDetails","Customer");
	}

	//---------------- PDI Details to be taken from Master once defined ---
	public function getPDIRev() {
		return $this->readConfig("PDIRevision","1.0");
	}

	public function getPDIRevDate() {
		return $this->readConfig("PDIRevDate","15/10/2023");
	}
	
	public function getPDIFormat() {
		return $this->readConfig("PDIFormat",$this->getCustomerPrefix().'/PDI/'.$this->getPDIRev());
	}

	public function isPDIRandomGeneratorEnabled() {
		return $this->readConfig("isPDIRandomGeneratorEnabled",false);
	}

	public function inwardDocNumber() {
		return $this->readConfig("inwardDocNumber","Q/A/F/06/");
	}

	public function inwardDocDate() {
		return $this->readConfig("inwardDocDate","28-05-2021");
	}

	public function inwardDocRevision() {
		return $this->readConfig("inwardDocRevision","01");
	}

	public function showMaterialRequestDetails() {
		return $this->readConfig("showDocRequestDetails","true");
	}

	public function isEnableStockUpdate() {
		return $this->readConfig("enableStockUpdate",false);
	}

	/** 
	 * -------------------------------------------------------------------
	 * Configure current customer type  Don't change without knowing
	 */
	public function getAROMCustomerName() {
		$AROMCustomerType = $this->session->userdata['AROMCustomerType'];
		if(empty($AROMCustomerType) || $AROMCustomerType == '' ) {
			$AROMCustomerType = $this->readConfig("AROMCustomerName","");
			$this->session->set_userdata('AROMCustomerType',$AROMCustomerType);
		}
		return $AROMCustomerType;
	}

	public function readConfig($configName,$defaultValue) {
		$configValue  = $this->Crud->customQuery("SELECT config_value FROM global_configuration WHERE config_name = '".$configName."'");
		if(empty($configValue[0]->config_value)) {
			return $defaultValue;
		}else{
			return trim($configValue[0]->config_value);
		}
	}

}