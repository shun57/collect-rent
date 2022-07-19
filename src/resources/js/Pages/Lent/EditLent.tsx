import React, { useEffect } from "react";
import Button from "@/Components/Button";
import Authenticated from "@/Layouts/Authenticated";
import Input from "@/Components/Input";
import Label from "@/Components/Label";
import SelectBox from "@/Components/SelectBox";
import ValidationErrors from "@/Components/ValidationErrors";
import { Head, useForm, usePage } from "@inertiajs/inertia-react";
import FlashMessage from '@/Components/FlashMessage';

declare var route;

export default function EditLent(props) {
    const intervals = props.types.map((x) => x + "日間");
    const { data, setData, post, processing, errors } = useForm({
        id: props.lent.data.id,
        name: props.lent.data.name,
        email: props.lent.data.email,
        lend_money: props.lent.data.lend_money,
        interval: props.lent.data.interval,
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

        post(route("lent.update"));
    };

    const { flash } : any = usePage().props

    return (
        <Authenticated
            auth={props.auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    取り立て情報編集
                </h2>
            }
        >
            <Head title="取り立て情報編集" />

            <div className="py-12 bg-white">
                <FlashMessage className="bg-red-100 border-red-500 text-red-700" message={flash.fail} />
                <div className="mx-auto sm:px-6 lg:px-8">
                    <ValidationErrors errors={errors} />

                    <form onSubmit={submit}>
                        <input
                            type="hidden"
                            name="id"
                            value={data.id}
                        />
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
                            />
                        </div>

                        <div className="mt-4">
                            <Label forInput="lend_money" value="貨した金額" />
                            <span className="text-red-600 text-xs"> ※必須</span>

                            <Input
                                type="number"
                                name="lend_money"
                                value={data.lend_money}
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
                                更新する
                            </Button>
                        </div>
                    </form>
                </div>
            </div>
        </Authenticated>
    );
}
