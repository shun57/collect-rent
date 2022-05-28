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
const lent_list = [
    ["テスト太郎", "test@test.com", "1000", "2020/05/05", "3日毎"],
    ["テスト太郎", "test@test.com", "3000", "2020/05/09", "1日毎"],
];

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = () => <Table>
                        <Table.TableHeader th={header_list} />
                        <Table.TableRow tds={lent_list}>
                            <td className="border"><Button className="m-2 bg-blue-600" processing={false}>編集</Button></td>
                            <td className="border"><Button className="m-2 bg-red-600" processing={false}>回収済</Button></td>
                        </Table.TableRow>
                       </Table>

export const Default = Template.bind({});
