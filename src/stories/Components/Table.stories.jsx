import React from 'react';
import Table from '../../resources/js/Components/Table';
import Button from '../../resources/js/Components/Button';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Component/Table',
  component: Table,
  args: {}
};

const header_list = ["貸主", "送信先アドレス", "貸した金額", "貸した日", "催促間隔", "", ""];
const lent_list = [{
  no: 1,
  name: 'テスト太郎',
  email: 'test@test.com',
  lendMoney: "1000円",
  createdAt: "2020/06/21",
  interval: "3日毎",
  editBtn: <Button className="m-2 bg-blue-600" processing={false}>編集</Button>,
  deleteBtn: <Button className="m-2 bg-red-600" processing={false}>回収済</Button>,
},
{
  no: 2,
  name: 'テスト2太郎',
  email: 'test2@test.com',
  lendMoney: "2000円",
  createdAt: "2020/06/05",
  interval: "1日毎",
  editBtn: <Button className="m-2 bg-blue-600" processing={false}>編集</Button>,
  deleteBtn: <Button className="m-2 bg-red-600" processing={false}>回収済</Button>,
}];

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = () => <Table>
                        <Table.TableHeader th={header_list} />
                        <Table.TableRow tds={lent_list} />
                       </Table>

export const Default = Template.bind({});
