import { Request, Response } from 'express';

export const homePage = (req: Request, res: Response) => {
    res.render('web/pages/home', {
        pageTitle: "Portfolio"
    });
}