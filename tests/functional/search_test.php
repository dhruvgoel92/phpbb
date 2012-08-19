<?php
/**
*
* @package testing
* @copyright (c) 2011 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* @group functional
*/
class phpbb_functional_search_test extends phpbb_functional_test_case
{
	public function test_search()
	{
		$this->login();
		//$crawler = $this->request('GET', 'search.php?keywords=phpbb3');
		$crawler = $this->request('GET', 'adm/index.php?sid=' . $this->sid . '&i=acp_search&mode=index');
		$this->assertContains('Everything', $crawler->text());
		//$this->assertGreaterThan(0, $crawler->filter('.postbody')->count());
	}

	public function test_search_form()
	{
		$crawler = $this->request('GET', 'search.php');
		$this->assertContains($this->lang('SEARCH_KEYWORDS'), $crawler);

		$form = $crawler->selectButton($this->lang('SEARCH'))->form();
		$search = $this->client->submit($form, array('keywords' => 'phpbb3'));
		$this->assertContains('Everything', $search->filter('.postbody')->text());
	}

}
