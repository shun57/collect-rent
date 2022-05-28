import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import Table from '@/Components/Table';
import Button from '@/Components/Button';

export default function Lent(props) {
    const header_list = ["名前", "送信先アドレス", "貸した金額", "貸した日", "催促間隔", "", ""];
    const lent_list = [
        ["テスト太郎", "test@test.com", "1000", "2020/05/05", "3日毎"],
        ["テスト太郎", "test@test.com", "3000", "2020/05/09", "1日毎"],
    ];
    return (
        <Authenticated
            auth={props.auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">取り立て一覧</h2>}
        >
            <Head title="取り立て一覧" />

            <p className="bg-white sm:px-6 lg:px-8">設定した間隔で19:00に催促メールが届きます。催促メールを止めるには、回収済ボタンを押下してください。</p>

            <div className="py-12 bg-white">
                <div className="mx-auto sm:px-6 lg:px-8">
                    <Table>
                        <Table.TableHeader th={header_list} />
                        <Table.TableRow tds={lent_list}>
                            <td className="border text-center"><Button className="m-2 bg-blue-600" processing={false}>編集</Button></td>
                            <td className="border text-center"><Button className="m-2 bg-red-600" processing={false}>回収済</Button></td>
                        </Table.TableRow>
                    </Table>
                </div>
            </div>
        </Authenticated>
    );
}
