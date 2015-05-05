<?php

namespace Yokohena\M20150418;

class M20150418Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->SUT = new M20150418();
    }

    /**
     * @test
     * @dataProvider 問題データ
     */
    public function test($input, $output)
    {
        $result = $this->SUT->solve($input);
        $this->assertThat($result, $this->equalTo($output));
    }

    public function 問題データ()
    {
        return [
            ["ADFC", "510" ],
            ["CFDA", "500" ],
            ["AB", "460" ],
            ["BA", "460" ],
            ["CD", "400" ],
            ["DC", "350" ],
            ["BG", "520" ],
            ["GB", "530" ],
            ["FDA", "450" ],
            ["ADF", "450" ],
            ["FDACB", "750" ],
            ["BCADF", "710" ],
            ["EDACB", "800" ],
            ["BCADE", "810" ],
            ["EGFCADE", "920" ],
            ["EDACFGE", "910" ],
            ["ABCDA", "960" ],
            ["ADCBA", "1000" ],
            ["BADCFGB", "1180" ],
            ["BGFCDAB", "1180" ],
            ["CDFC", "460" ],
            ["CFDC", "450" ],
            ["ABGEDA", "1420" ],
            ["ADEGBA", "1470" ],
            ["CFGB", "640" ],
            ["BGFC", "630" ],
            ["ABGEDFC", "1480" ],
            ["CFDEGBA", "1520" ],
            ["CDFGEDABG", "1770" ],
            ["GBADEGFDC", "1680" ],
        ];
    }
}
