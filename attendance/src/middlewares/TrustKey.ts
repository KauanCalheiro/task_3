import { NextFunction, Request, Response } from "express";

const TrustKey = (req: Request, res: Response, next: NextFunction) => {
    const requestToken = req.headers.authorization?.replace("Bearer ", "");
    const envToken     = process.env.TRUST_KEY;

    const isTokensMatch = requestToken === envToken;

    if ( !isTokensMatch ) {
        res.status(401).send({ message: "Unauthorized" });
        return;
    }

    return next();
};

export default TrustKey;