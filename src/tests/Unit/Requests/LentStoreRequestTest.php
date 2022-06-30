<?php

declare(strict_types=1);

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Lent\StoreRequest;

class LentStoreRequestTest extends TestCase
{
    /**
     *
     * @param array 項目名の配列
     * @param array 値の配列
     * @param boolean 期待値(true:バリデーションOK、false:バリデーションNG)
     * @dataProvider lentStoreData
     */
    public function test_取り立て情報登録のバリデーションテスト(array $keys, array $values, bool $expect): void
    {
        $dataList = array_combine($keys, $values);

        $request = new StoreRequest();

        $rules = $request->rules();

        $validator = Validator::make($dataList, $rules);
        $result = $validator->passes();

        $this->assertEquals($expect, $result);
    }

    public function lentStoreData()
    {
        return [
            'OK' => [
                ['name', 'email', 'lend_money', 'interval'],
                [str_repeat('a', 255), 'test@example.com', 10000, 1],
                true
            ],
            '名前必須エラー' => [
                ['name', 'email', 'lend_money', 'interval'],
                [null, 'test@example.com', 100, 1],
                false
            ],
            '名前形式エラー' => [
                ['name', 'email', 'lend_money', 'interval'],
                [1, 'test@example.com', 100, 1],
                false
            ],
            '名前最大文字数エラー' => [
                ['name', 'email', 'lend_money', 'interval'],
                [str_repeat('a', 256), 'test@example.com', 100, 1],
                false
            ],
            'email必須エラー' => [
                ['name', 'email', 'lend_money', 'interval'],
                ['testuser', null, 100, 1],
                false
            ],
            'email形式エラー' => [
                ['name', 'email', 'lend_money', 'interval'],
                ['testuser', 'test@example.', 100, 1],
                false
            ],
            'email最大文字数エラー' => [
                ['name', 'email', 'lend_money', 'interval'],
                ['testuser', str_repeat('a', 256), 100, 1],
                false
            ],
            'money必須エラー' => [
                ['name', 'email', 'lend_money', 'interval'],
                ['testuser', 'test@example.com', null, 1],
                false
            ],
            'money形式エラー' => [
                ['name', 'email', 'lend_money', 'interval'],
                ['testuser', 'test@example.com', 'testmoney', 1],
                false
            ],
            'money最大数エラー' => [
                ['name', 'email', 'lend_money', 'interval'],
                ['testuser', 'test@example.com', 10001, 1],
                false
            ],
            'interval値エラー' => [
                ['name', 'email', 'lend_money', 'interval'],
                ['testuser', 'test@example.com', 100, 100],
                false
            ],
        ];
    }
}
