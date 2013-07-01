<?php
/**
 * This source file is part of GotCms.
 *
 * GotCms is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * GotCms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with GotCms. If not, see <http://www.gnu.org/licenses/lgpl-3.0.html>.
 *
 * PHP Version >=5.3
 *
 * @category Gc_Tests
 * @package  ZfModules
 * @author   Pierre Rambaud (GoT) <pierre.rambaud86@gmail.com>
 * @license  GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link     http://www.got-cms.com
 */

namespace Content\Controller;

use Gc\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-14 at 19:50:27.
 *
 * @group    ZfModules
 * @category Gc_Tests
 * @package  ZfModules
 */
class TranslationControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->init();
    }

    /**
     * Test
     *
     * @return void
     */
    public function testCreateAction()
    {
        $this->dispatch('/admin/content/translation/create');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Content');
        $this->assertControllerName('TranslationController');
        $this->assertControllerClass('TranslationController');
        $this->assertMatchedRouteName('content/translation/create');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testCreateActionWithPostData()
    {
        $this->dispatch(
            '/admin/content/translation/create',
            'POST',
            array(
                'source' => 'test',
                'destination' => array(
                    1 => 'test',
                    2 => 'test2',
                ),
                'locale' => array(
                    1 => 'fr_FR',
                    4 => 'fr_FR',
                )
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Content');
        $this->assertControllerName('TranslationController');
        $this->assertControllerClass('TranslationController');
        $this->assertMatchedRouteName('content/translation/create');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testCreateActionWithInvalidPostData()
    {
        $this->dispatch(
            '/admin/content/translation/create',
            'POST',
            array(
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Content');
        $this->assertControllerName('TranslationController');
        $this->assertControllerClass('TranslationController');
        $this->assertMatchedRouteName('content/translation/create');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testIndexAction()
    {
        $this->dispatch('/admin/content/translation');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Content');
        $this->assertControllerName('TranslationController');
        $this->assertControllerClass('TranslationController');
        $this->assertMatchedRouteName('content/translation');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testIndexActionWithInvalidPostData()
    {
        $this->dispatch(
            '/admin/content/translation',
            'POST',
            array(
                'destination' => '',
                'source' => '',
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Content');
        $this->assertControllerName('TranslationController');
        $this->assertControllerClass('TranslationController');
        $this->assertMatchedRouteName('content/translation');
    }

    /**
     * Test
     *
     * @return void
     */
    public function testIndexActionWithPostData()
    {
        $destination = array(
            1 => array(),
            2 => array(),
            3 => array(),
            4 => array(),
            5 => array(),
        );

        $destination[1][1]           = array();
        $destination[1][1]['dst_id'] = '1';
        $destination[1][1]['locale'] = 'fr_FR';
        $destination[1][1]['value']  = 'Vues';
        $destination[2][2]           = array();
        $destination[2][2]['dst_id'] = '2';
        $destination[2][2]['locale'] = 'fr_FR';
        $destination[2][2]['value']  = 'Stats du site web';
        $destination[3][3]           = array();
        $destination[3][3]['dst_id'] = '3';
        $destination[3][3]['locale'] = 'fr_FR';
        $destination[3][3]['value']  = 'Bienvenue %s';
        $destination[4][4]           = array();
        $destination[4][4]['dst_id'] = '4';
        $destination[4][4]['locale'] = 'fr_FR';
        $destination[4][4]['value']  = 'Fonctionnent comme les vues, vous pouvez récupérer les propriétés, '
            . 'use helpers et si vous voulez intégrer l\'enfant (vue) écrivez : $this->content.';
        $destination[5][5]           = array();
        $destination[5][5]['dst_id'] = '5';
        $destination[5][5]['locale'] = 'fr_FR';
        $destination[5][5]['value']  = 'Fonctionnent comme les contrôleurs Zend Framework, vous pouvez récupérer'
            . ' la requête (Request), la réponse (Response) et utiliser les plugins de contrôleurs.';

        $source    = array();
        $source[1] = 'Views';
        $source[2] = 'Website statistics';
        $source[3] = 'Welcome %s';
        $source[4] = 'Work like views, you can get properties, use helpers, and if you want to integrate children '
            . '(view) write: $this->content.';
        $source[5] = 'Work like Zend Framework controllers, you can get the request, response and controller plugins.';

        $this->dispatch(
            '/admin/content/translation',
            'POST',
            array(
                'destination' => $destination,
                'source' => $source,
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Content');
        $this->assertControllerName('TranslationController');
        $this->assertControllerClass('TranslationController');
        $this->assertMatchedRouteName('content/translation');
    }
}
