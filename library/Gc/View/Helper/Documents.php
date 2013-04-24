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
 * @category   Gc
 * @package    Library
 * @subpackage View\Helper
 * @author     Pierre Rambaud (GoT) <pierre.rambaud86@gmail.com>
 * @license    GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link       http://www.got-cms.com
 */

namespace Gc\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Gc\Document\Collection as DocumentCollection;
use Gc\Document\Model as DocumentModel;

/**
 * Returns documents from parent_id
 *
 * @category   Gc
 * @package    Library
 * @subpackage View\Helper
 */
class Documents extends AbstractHelper
{
    /**
     * Returns documents
     * $data can be mixed
     * if data is an array, return all documents
     * if data is numeric, return all documents with parent_id equal to $data
     *
     * @param mixed $data Data
     *
     * @return array \Gc\Document\Model
     */
    public function __invoke($data = null)
    {
        $documents = new DocumentCollection();
        if (empty($data)) {
            $elements = $documents->load(0)->getDocuments();
        } else {
            if (is_numeric($data)) {
                $elements = $documents->load($data)->getDocuments();
            } elseif (is_array($data)) {
                $elements = array();
                foreach ($data as $documentId) {
                    if (empty($documentId) or !is_numeric($documentId)) {
                        continue;
                    }

                    $document = DocumentModel::fromId($documentId);
                    if (!empty($document)) {
                        $elements[] = $document;
                    }
                }
            }
        }

        return $elements;
    }
}