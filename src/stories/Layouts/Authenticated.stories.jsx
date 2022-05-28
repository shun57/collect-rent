import React from 'react';
import Authenticated from '../../resources/js/Layouts/Authenticated';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Layout/Authenticated',
  component: Authenticated,
  args: {
    auth: {
      user: {
        name: 'tarou',
        email: 'tarou@test.com'
      }
    },
    header: <h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => 
<Authenticated {...args} >
    <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div className="p-6 bg-white border-b border-gray-200">You're logged in!</div>
            </div>
        </div>
    </div>
</Authenticated>;

export const Default = Template.bind({});
