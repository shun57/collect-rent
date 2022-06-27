import { keyBy } from "lodash";
import React from "react";

interface Props {
    options: Array<string>;
    values: Array<number>;
    handleChange: React.ChangeEventHandler<HTMLSelectElement>;
}

export default function SelectBox({ options, values, handleChange }: Props) {
    const option = options.map((option, index) => (
        <option key={index} value={values[index]}>{option}</option>
    ));
    return (
        <div>
            <select
                className="form-select appearance-none border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full px-3 py-1.5"
                onChange={(e) => handleChange(e)}
            >
                {option}
            </select>
        </div>
    );
}
