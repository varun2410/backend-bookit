<?php

namespace MovieListBundle\Controller;

use MovieListBundle\Entity\Movies;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return new Response('Yo My Man!!!');
    }

    /**
     * @Route("/admin/movies", methods={"GET"}, name="getAllAdminMovies")
     *
     * @param Request $request
     */
    public function getMovieList(Request $request)
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $movies = $this->getDoctrine()
            ->getRepository('MovieListBundle:Movies')
            ->findAll();

        foreach ($movies as $movie)
        {
            $movie->setExpirydate($movie->getExpirydate()->format('Y-m-d'));
        }

        print_r($serializer->serialize($movies, 'json'));die;
    }

    /**
     * @Route("/admin/movie", methods={"POST"}, name="addMovies")
     *
     * @param Request $request
     * @return Response
     */
    public function addMovie(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $movie = new Movies();
        $data = $request->request->all();
        $filename = $this->get('movie_list.utils_service')
            ->uploadFile($request->files->get('posterurl'));

        $posterUrl = 'http://api.bookit.in/uploads/'.$filename;

        $movie->setName($data['name'])
            ->setDescription($data['description'])
            ->setPosterurl($posterUrl)
            ->setLanguage($data['language'])
            ->setStarcast($data['starcast'])
            ->setExpirydate(\DateTime::createFromFormat('Y-m-d', $data['expirydate']));

        $em->persist($movie);
        $em->flush();

        return new Response('Movie Added Successfully');

    }
}
