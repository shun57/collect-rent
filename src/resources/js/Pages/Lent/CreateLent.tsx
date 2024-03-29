import React, { useEffect } from "react";
import Button from "@/Components/Button";
import Authenticated from "@/Layouts/Authenticated";
import Input from "@/Components/Input";
import Label from "@/Components/Label";
import SelectBox from "@/Components/SelectBox";
import ValidationErrors from "@/Components/ValidationErrors";
import { Head, useForm } from "@inertiajs/inertia-react";

declare var route;

export default function CreateLent(props) {
    const intervals = props.types.map(x => x + "日間");
    const { data, setData, post, processing, errors } = useForm({
        name: "",
        email: "",
        lend_money: 100,
        interval: "1",
    });

    const onHandleChange = (
        event:
            | React.ChangeEvent<HTMLInputElement>
            | React.ChangeEvent<HTMLSelectElement>
    ) => {
        setData(
            event.target.name as "email" | "lend_money" | "name" | "interval",
            event.target.value
        );
    };

    const submit = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        post(route("lent.store"));
    };

    return (
        <Authenticated
            auth={props.auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    取り立て情報作成
                </h2>
            }
        >
            <Head title="取り立て情報登録" />

            <p className="bg-white sm:px-6 lg:px-8">取り立て情報を登録した日付から「取り立て頻度」ごとに貸主に催促メールが送信されます。</p>
            <p className="bg-white sm:px-6 lg:px-8">金額は10,000円以下でのみ設定が可能です。</p>

            <div className="py-12 bg-white">
                <div className="mx-auto sm:px-6 lg:px-8">
                    <ValidationErrors errors={errors} />

                    <form onSubmit={submit}>
                        <div>
                            <Label forInput="name" value="貸主名" />
                            <span className="text-red-600 text-xs">  ※必須</span>

                            <Input
                                type="text"
                                name="name"
                                value={data.name}
                                className="mt-1 block w-full"
                                autoComplete="name"
                                isFocused={true}
                                handleChange={onHandleChange}
                                required
                                placeholder="借照 太郎"
                            />
                        </div>

                        <div className="mt-4">
                            <Label
                                forInput="email"
                                value="貸主メールアドレス"
                            />
                            <span className="text-red-600 text-xs"> ※必須</span>

                            <Input
                                type="email"
                                name="email"
                                value={data.email}
                                className="mt-1 block w-full"
                                autoComplete="username"
                                handleChange={onHandleChange}
                                required
                                placeholder="kariteru-tarou@test.com"
                            />
                        </div>

                        <div className="mt-4">
                            <Label forInput="lend_money" value="貨した金額" />
                            <span className="text-red-600 text-xs"> ※必須</span>

                            <Input
                                type="number"
                                name="lend_money"
                                value={data.lend_money}
                                min={1}
                                max={10000}
                                className="mt-1 block w-full"
                                handleChange={onHandleChange}
                                required
                            />
                        </div>

                        <div className="mt-4">
                            <Label forInput="interval" value="取り立て頻度" />

                            <SelectBox
                                name="interval"
                                options={intervals}
                                value={data.interval}
                                values={props.types}
                                handleChange={onHandleChange}
                            />
                        </div>

                        <div className="flex items-center justify-end mt-4">
                            <Button
                                className="ml-4 bg-green-600"
                                processing={processing}
                            >
                                取り立てる
                            </Button>
                        </div>
                    </form>
                </div>
            </div>
        </Authenticated>
    );
}
