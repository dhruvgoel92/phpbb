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
		$crawler = $this->request('GET', 'search.php?keywords=phpbb3');
		$this->assertGreaterThan(0, $crawler->filter('.postbody')->count());
	}
}
