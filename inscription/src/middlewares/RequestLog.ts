import { NextFunction, Request, Response } from "express";

const RequestLog = (req: Request, res: Response, next: NextFunction) => {
    const body = {
        request_path: req.protocol + '://' + req.get('host') + req.originalUrl,
        request_method: req.method,
        request_body: JSON.stringify(req.body),
        request_headers: JSON.stringify(req.headers),
        request_params: JSON.stringify(req.query),
    };

    fetch('http://php-log:80/api', {
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${process.env.TRUST_KEY}`,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(body),
    }).then(response => {
        if (!response.ok) {
            res.status(500).send({ message: 'Failed to log request' });
            return;
        }

        return next();
    });
};

export default RequestLog;