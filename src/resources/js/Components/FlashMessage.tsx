import React from 'react';

interface Props {
    message?: string;
    className?: string;
}

export default function FlashMessage({ message, className }: Props) {
    return (
        <div className='bg-white'>
            { message && (
                <div className={`border py-3 sm:px-6 lg:px-8 sm:mx-6 lg:mx-8 rounded ` + className} role="alert">
                    <p className="text-sm">{message}</p>
                </div>
            )}
        </div>
    );
}
