import  { Request, Response } from 'express';


export const error404 = (req: Request, res: Response) => {
    res.render('web/errors/404');
};

export default null;