<?php
namespace metastore;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class SkewedInfo
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'skewedColNames',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
        2 => array(
            'var' => 'skewedColValues',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::LST,
            'elem' => array(
                'type' => TType::LST,
                'etype' => TType::STRING,
                'elem' => array(
                    'type' => TType::STRING,
                    ),
                ),
        ),
        3 => array(
            'var' => 'skewedColValueLocationMaps',
            'isRequired' => false,
            'type' => TType::MAP,
            'ktype' => TType::LST,
            'vtype' => TType::STRING,
            'key' => array(
                'type' => TType::LST,
                'etype' => TType::STRING,
                'elem' => array(
                    'type' => TType::STRING,
                    ),
            ),
            'val' => array(
                'type' => TType::STRING,
                ),
        ),
    );

    /**
     * @var string[]
     */
    public $skewedColNames = null;
    /**
     * @var (string[])[]
     */
    public $skewedColValues = null;
    /**
     * @var array
     */
    public $skewedColValueLocationMaps = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['skewedColNames'])) {
                $this->skewedColNames = $vals['skewedColNames'];
            }
            if (isset($vals['skewedColValues'])) {
                $this->skewedColValues = $vals['skewedColValues'];
            }
            if (isset($vals['skewedColValueLocationMaps'])) {
                $this->skewedColValueLocationMaps = $vals['skewedColValueLocationMaps'];
            }
        }
    }

    public function getName()
    {
        return 'SkewedInfo';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::LST) {
                        $this->skewedColNames = array();
                        $_size115 = 0;
                        $_etype118 = 0;
                        $xfer += $input->readListBegin($_etype118, $_size115);
                        for ($_i119 = 0; $_i119 < $_size115; ++$_i119) {
                            $elem120 = null;
                            $xfer += $input->readString($elem120);
                            $this->skewedColNames []= $elem120;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->skewedColValues = array();
                        $_size121 = 0;
                        $_etype124 = 0;
                        $xfer += $input->readListBegin($_etype124, $_size121);
                        for ($_i125 = 0; $_i125 < $_size121; ++$_i125) {
                            $elem126 = null;
                            $elem126 = array();
                            $_size127 = 0;
                            $_etype130 = 0;
                            $xfer += $input->readListBegin($_etype130, $_size127);
                            for ($_i131 = 0; $_i131 < $_size127; ++$_i131) {
                                $elem132 = null;
                                $xfer += $input->readString($elem132);
                                $elem126 []= $elem132;
                            }
                            $xfer += $input->readListEnd();
                            $this->skewedColValues []= $elem126;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::MAP) {
                        $this->skewedColValueLocationMaps = array();
                        $_size133 = 0;
                        $_ktype134 = 0;
                        $_vtype135 = 0;
                        $xfer += $input->readMapBegin($_ktype134, $_vtype135, $_size133);
                        for ($_i137 = 0; $_i137 < $_size133; ++$_i137) {
                            $key138 = array();
                            $val139 = '';
                            $key138 = array();
                            $_size140 = 0;
                            $_etype143 = 0;
                            $xfer += $input->readListBegin($_etype143, $_size140);
                            for ($_i144 = 0; $_i144 < $_size140; ++$_i144) {
                                $elem145 = null;
                                $xfer += $input->readString($elem145);
                                $key138 []= $elem145;
                            }
                            $xfer += $input->readListEnd();
                            $xfer += $input->readString($val139);
                            $this->skewedColValueLocationMaps[$key138] = $val139;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('SkewedInfo');
        if ($this->skewedColNames !== null) {
            if (!is_array($this->skewedColNames)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('skewedColNames', TType::LST, 1);
            $output->writeListBegin(TType::STRING, count($this->skewedColNames));
            foreach ($this->skewedColNames as $iter146) {
                $xfer += $output->writeString($iter146);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->skewedColValues !== null) {
            if (!is_array($this->skewedColValues)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('skewedColValues', TType::LST, 2);
            $output->writeListBegin(TType::LST, count($this->skewedColValues));
            foreach ($this->skewedColValues as $iter147) {
                $output->writeListBegin(TType::STRING, count($iter147));
                foreach ($iter147 as $iter148) {
                    $xfer += $output->writeString($iter148);
                }
                $output->writeListEnd();
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->skewedColValueLocationMaps !== null) {
            if (!is_array($this->skewedColValueLocationMaps)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('skewedColValueLocationMaps', TType::MAP, 3);
            $output->writeMapBegin(TType::LST, TType::STRING, count($this->skewedColValueLocationMaps));
            foreach ($this->skewedColValueLocationMaps as $kiter149 => $viter150) {
                $output->writeListBegin(TType::STRING, count($kiter149));
                foreach ($kiter149 as $iter151) {
                    $xfer += $output->writeString($iter151);
                }
                $output->writeListEnd();
                $xfer += $output->writeString($viter150);
            }
            $output->writeMapEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
