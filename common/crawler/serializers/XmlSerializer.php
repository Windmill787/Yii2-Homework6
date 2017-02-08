<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 25.01.17
 * Time: 13:49
 */

namespace common\crawler\serializers;

use common\crawler\interfaces\SerializerInterface;
use SimpleXMLElement;

class XmlSerializer implements SerializerInterface
{
    /**
     * @inheritdoc
     */
    public function morf($data)
    {
        $xml = new SimpleXMLElement('<main/>');
        array_walk_recursive($data, array($xml, 'addChild'));
        return $xml->asXML();
    }
}