import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head, usePage, InertiaLink } from '@inertiajs/inertia-react';
import Table from '@/Components/Table';
import Button from '@/Components/Button';
import FlashMessage from '@/Components/FlashMessage';

declare var route;

export default function Lent(props) {
    interface Lent {
        no: number;
        name: string;
        email: string;
        lendMoney: string;
        createdAt: string;
        interval: string;
        editBtn: any;
        deleteBtn: any;
    }

    const header_list = ["NO", "名前", "送信先アドレス", "貸した金額", "貸した日", "催促間隔", "", ""];
    const lent_list: Lent[] = [];
    props.lents.map((lent, index) =>
        lent_list.push({
            no: index + 1,
            name: lent.name,
            email: lent.email,
            lendMoney: lent.lend_money + "円",
            createdAt: lent.created_at,
            interval: lent.interval + "日毎",
            editBtn: <InertiaLink href={route('lent.edit', lent.id)}><Button type="button" className="m-2 bg-blue-600" processing={false}>編集</Button></InertiaLink>,
            deleteBtn: <Button className="m-2 bg-red-600" processing={false}>回収済</Button>,
        })
    );

    const { flash } : any = usePage().props

    return (
        <Authenticated
            auth={props.auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">取り立て一覧</h2>}
        >
            <Head title="取り立て一覧" />

            <FlashMessage className="bg-green-100 border-green-500 text-green-700" message={flash.success} />
            <FlashMessage className="bg-red-100 border-red-500 text-red-700" message={flash.fail} />

            <p className="bg-white sm:px-6 lg:px-8">設定した間隔で19:00に催促メールが届きます。催促メールを止めるには、回収済ボタンを押下してください。</p>
            <p className="bg-white sm:px-6 lg:px-8">最大10件まで無料で登録できます。それ以上登録したい場合は有料プランにご登録ください（未リリース）。</p>

            <div className="py-12 bg-white">
                <div className="mx-auto sm:px-6 lg:px-8">
                    <Table>
                        <Table.TableHeader th={header_list} />
                        <Table.TableRow tds={lent_list} />
                    </Table>
                </div>
            </div>
        </Authenticated>
    );
}
